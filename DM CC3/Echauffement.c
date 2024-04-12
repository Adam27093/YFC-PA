#include <stdio.h>
#include <math.h> // Pour fabs()

// Fonction f(x) = x^2 - |α|
double f(double x, double alpha) {
    return x * x - fabs(alpha);
}

// Fonction de recherche dichotomique pour trouver la racine carrée d'un réel α
double rechercheDichotomique(double alpha, int maxIterations) {
    double debut = 0;
    double fin = (alpha < 1) ? 1 : alpha; // Si alpha < 1, on ajuste 'fin' pour être au moins 1.
    double solution = 0;
    
    for(int i = 0; i < maxIterations; i++) {
        solution = (debut + fin) / 2; // Calcul de la valeur médiane
        
        // Si f(solution) et f(debut) ont des signes différents, la racine est dans [debut, solution]
        if(f(solution, alpha) * f(debut, alpha) < 0) {
            fin = solution;
        }
        // Sinon, la racine est dans [solution, fin]
        else if(f(solution, alpha) * f(fin, alpha) < 0) {
            debut = solution;
        }
        // Si f(solution) est 0 (ou proche, en pratique), on peut sortir
        else {
            break;
        }
    }
    
    // Après maxIterations, 'solution' est une approximation de la racine carrée de alpha
    return solution;
}

int main() {
    double alpha;
    int maxIterations = 100; // Nombre fixe d'itérations pour la simplicité
    
    printf("Entrez un réel : ");
    scanf("%lf", &alpha);
    
    double racine = rechercheDichotomique(alpha, maxIterations);
    printf("La racine carrée de %lf est approximativement %lf\n", alpha, racine);
    
    return 0;
}
