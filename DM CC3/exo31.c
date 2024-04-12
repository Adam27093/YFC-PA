#include <stdio.h>
#include <stdlib.h>

int carre(int x) {
    return x * x;
}

int main() {
    int a = 41;
    int resultat = carre(a);
    printf("Le carré de %d est %d\n", a, resultat);
    return 0;
}
