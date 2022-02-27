<?php 
require '../../classes/Carte.php';
session_start();
// Quand on clique sur le bouton jouer
if(isset($_POST['jouer'])) {
// Qu'on a au préalable choisit le nombre de paires de cartes 
    if(isset($_POST['paire_carte'])) {
        $nb_carte = intval($_POST['paire_carte']);
        $_SESSION['nb_carte'] = $nb_carte;
        $_SESSION['level'] = $nb_carte;

// On sécurise le jeux avec is_int pour avoir seulement un nbr entier compris entre 3 et 12
        if(is_int($nb_carte) == true && $nb_carte >=3 && $nb_carte <=12) {
            // On génère une boucle qui nous donne le nombre de paire choisit
            for($j=0; $j<$nb_carte; $j++) {
            // On stoque les paire dans un tableau 
                $tableau['game'][$j] = new Carte($j);
            // On duplique le tableau avec le même nbr de paire pr avoir tte les cartes du jeu
                $tableau['game'][$j+$nb_carte] = new Carte($j);
            // On stocke le tableau GAME dans une session GAME
                $_SESSION['game'] = $tableau['game'];
            // On mélange la session pour avoir les même cartes à chaque fois
                shuffle($_SESSION['game']);                
                header("Location: ../../view/memory.php");
            }
        }
        else {
            header("Location: ../../view/memory.php");
        }
    }
}

if(isset($_POST['rejouer'])) {
    unset($_SESSION['game']);
    $_SESSION['coup'] = 0;
    $_SESSION['nbPaire'] = 0;
    $_SESSION['level'] = 0;
    $_SESSION['point'] = 0;
    unset($_SESSION['tableau']);

    unset($_SESSION['msgEndGame']);
    header("Location: ../../view/memory.php");
}
