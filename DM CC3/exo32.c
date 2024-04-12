#include <stdio.h>
#include <stdlib.h>

int menu() {
    int choix;
    do {
        printf("Menu :\n");
        printf("1 - un truc\n");
        printf("2 - un autre\n");
        printf("3 - quitter\n");
        printf("---\nVotre choix : ");
        scanf("%d", &choix);
        getchar();
        printf("\n");
    } while (choix < 1 || choix > 3);
    return choix;
}

int main() {
    printf("%d, bien reçu.\n", menu());
    exit(EXIT_SUCCESS);
}
