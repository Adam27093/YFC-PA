Yanis Derghal
#include <stdio.h>

// Je fais la déclaration de la structure pour un personnage
struct Personnage {
    int vie;
    int attaque;
    int defense;
};

//  Je crée une fonction pour que je cogne l'adversaire
void cogner(struct Personnage *joueur, struct Personnage *adversaire) {
    // Je réduis la vie de l'adversaire selon la différence entre mon attaque et sa défense
    int degats = joueur->attaque - adversaire->defense;
    if (degats > 0) {
        adversaire->vie -= degats;
    }
    printf("Je cogne l'adversaire ! Grrrr\n");
}

// Je crée une fonction sesoigner
void se_soigner(struct Personnage *joueur) {
    // Ici j'augmente la vie de 10 poins
    joueur->vie += 10;
    printf("Je me soigne. Sa fait du bien.\n");
}

// Une autre fonction pour augmenter l'attaque augmenter_attaque
void augmenter_attaque(struct Personnage *joueur) {
    // Ici j'augmente  l'attaque de 10 point
    joueur->attaque += 10;
    printf("J'augmente mon attaque. Yaaaa ! \n");
}

// Une fonction pour augmenter la défense soit augmenter_defense
void augmenter_defense(struct Personnage *joueur) {
    // J'augmente la défense de 10 point
    joueur->defense += 10;
    printf("J'augmente ma défense. On se protège(;\n");
}

// Une fonction pour afficher létat des deux personnages soit leurs statistique;
void afficher_etat(struct Personnage joueur, struct Personnage adversaire) {
    // J'affiche mes statistiques ainsi que celle de l'adversaire pour prendre connaissance de qui a les meilleur statistiques pendant le combat
    printf("Mes statistiques: vie=%d, attaque=%d, defense=%d\n", joueur.vie, joueur.attaque, joueur.defense);
    printf("Statistiques de mon adversaire: vie=%d, attaque=%d, defense=%d\n", adversaire.vie, adversaire.attaque, adversaire.defense);
}

int main() {
    // J'initiale mes statistiques et celles de mon adversaire
    struct Personnage moi = {100, 50, 20};
    struct Personnage adversaire = {100, 50, 20};
    int choix; // Je Stock mon choix

    // On commence le combat
    while (moi.vie > 0 && adversaire.vie > 0) {
        // J'affiche l'état actuel des personnages
        afficher_etat(moi, adversaire);
        // J'affiche les actions disponibles pour moi donc la il faut choisir en tre les 4
        printf("1 - cogner\n2 - me soigner\n3 - augmenter mon attaque\n4 - augmenter ma defense\nVotre choix: ");
        // Je choisis une action
        scanf("%d", &choix);

        // Je traite le choix
        switch (choix) {
            case 1:
                cogner(&moi, &adversaire); // Je cogne l'adversaire
                cogner(&adversaire, &moi); // L'adversaire riposte
                break;
            case 2:
                se_soigner(&moi); // Je me soigne
                cogner(&adversaire, &moi); // L'adversaire attaque
                break;
            case 3:
                augmenter_attaque(&moi); // J'augmente mon attaque
                cogner(&adversaire, &moi); // L'adversaire attaque
                break;
            case 4:
                augmenter_defense(&moi); // J'augmente ma défense
                cogner(&adversaire, &moi); // L'adversaire attaque
                break;
            default:
                printf("Ton Choix est invalide.\n"); // J'affiche ici un message si mon choix est invalide
        }
    }

    // Et la j'affiche le résultat final du combat
    if (moi.vie <= 0) {
        printf("J'ai perdu le combat. Nonnnnn ! \n"); // J'ai perdu
    } else {
        printf("J'ai gagné le combat. Yessssss! \n"); // J'ai gagné
    }

    return 0;
}
