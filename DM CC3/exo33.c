#include <stdio.h>
#include <stdlib.h>

float moyenne() {
    float somme = 0.0;
    int count = 0;
    float valeur;

    printf("Entrez des nombres positifs (entrez un nombre négatif pour terminer) :\n");

    do {
        printf("Nombre %d : ", count + 1);
        scanf("%f", &valeur);

        if (valeur >= 0) {
            somme += valeur;
            count++;
        } else {
            break;
        }
    } while (1);

    if (count == 0) {
        printf("Aucun nombre positif entré.\n");
        return 0;
    } else {
        return somme / count;
    }
}

int main() {
    printf("La moyenne = %g\n", moyenne());
    exit(EXIT_SUCCESS);
}
