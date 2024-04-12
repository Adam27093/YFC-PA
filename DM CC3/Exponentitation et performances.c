Yanis Derghal
#include <stdio.h>
J'ai regrouper toutes les fonctions ici mais normalement elles fonctionnes toutes

Fonction Puissance
long puissance(long a, long n) {
    long resultat = 1; 
    // Je démarre avec un résultat de 1, car n'importe quel nombre élevé à la puissance de 0 donne 1.
    for(long i = 0; i < n; i++) { // Je boucle n fois...
        resultat *= a; // ...et à chaque itération, je multiplie le résultat par 'a', ce qui simule la multiplication répétée de 'a' par lui-même.
    }
    return resultat; // Après avoir terminé la boucle, je retourne le résultat final.
}


long puissance_rapide(long valeur, long exposant) {
    long resultat = 1; // Encore une fois, je commence avec 1 pour la même raison.
    while (exposant > 0) { // Tant que l'exposant est supérieur à 0, je continue à boucler.
        if (exposant % 2 == 1) { // Si l'exposant est impaire
            resultat *= valeur; // la je multiplie le résultat par la valeur. Cela s'assure que je capture le produit de valeur pour chaque bit d'exposant.
        }
        valeur *= valeur; // J'élève la valeur au carré, ce qui correspond au décalage des bits d'exposant à gauche.
        exposant /= 2; // Je divise l'exposant par 2, déplaçant essentiellement l'exposant d'un bit vers la droite.
    }
    return resultat; // Je retourne le résultat, qui est 'valeur' élevée à la puissance de 'exposant' original.
}

unsigned long puissance_modulo(unsigned long a, unsigned long n, unsigned long p) {
    unsigned long resultat = 1; // Je commence par initialiser le résultat à 1. C'est le cas de base pour n'importe quelle puissance.
    for(unsigned long i = 0; i < n; i++) {
        resultat = (resultat * a) % p; // À chaque itération, je multiplie le résultat actuel par 'a', puis je prends le modulo 'p'.
        // Cela garantit que le résultat reste dans les limites de 'p' et évite les débordements pour de grands nombres.
    }
    return resultat; // Finalement, je retourne le résultat qui est 'a' élevé à la puissance 'n' modulo 'p'.
}

unsigned long puissance_rapide_modulo(unsigned long a, unsigned long n, unsigned long p) {
    unsigned long resultat = 1; // De nouveau, je démarre avec un résultat de 1.
    a = a % p; // Je réduis 'a' modulo 'p' d'abord, au cas où 'a' serait plus grand que 'p', pour simplifier les calculs suivants.
    while (n > 0) {
        if (n % 2 == 1) { // Si l'exposant 'n' est impair...
            resultat = (resultat * a) % p; // ...je multiplie le résultat par 'a' et prends le modulo 'p'. Cela s'assure que le produit intermédiaire reste dans les limites de 'p'.
        }
        a = (a * a) % p; // J'élève 'a' au carré et prends le modulo 'p'. Cela correspond au décalage des bits de 'n' vers la droite.
        n /= 2; // Je divise 'n' par 2, en déplaçant l'exposant d'un bit vers la droite.
    }
    return resultat; // Le résultat final est 'a' élevé à la puissance 'n', le tout modulo 'p'.
}

