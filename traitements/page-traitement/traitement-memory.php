<?php
require '../classes/Carte.php';

session_start();
// Si ma session est créé, 
if(isset($_SESSION['game'])) {
// et que mon lien est cliqué,    
    if(isset($_GET['lien'])) {
// je récupère de ma session(du coup mon objet) avec son état OPEN pour pouvoir retourner ma carte.
        $_SESSION['game'][$_GET['lien']]->openEtatCarte();
        
        if(isset($_SESSION['tableau'])) {
            if(count($_SESSION['tableau'])<2) {
                $_SESSION['tableau'][2] = $_SESSION['game'][$_GET['lien']];

                if($_SESSION['tableau'][1]->valeur == $_SESSION['tableau'][2]->valeur+3 || $_SESSION['tableau'][1]->valeur == $_SESSION['tableau'][2]->valeur-3) {

                    $_SESSION['tableau'][1]->etat = 'open';
                    $_SESSION['tableau'][2]->etat = 'open';

                    unset($_SESSION['tableau']);
                }

//                 if($_SESSION['game'][1]->valeur == $_SESSION['game'][2]->valeur) {
// // je retourne mes 2 cartes.
//                     $_SESSION['game'][1]->etat = 'open';
//                     $_SESSION['game'][2]->etat = 'open';
// // Je vide ma session
//                     unset($_SESSION['game']);
//                 }
// Sinon mes cartes restent retournées.
                else {
                    $_SESSION['tableau'][1]->etat = 'close';
                    $_SESSION['tableau'][2]->etat = 'close';

                    unset($_SESSION['tableau']);
                }  
            }
        }
        else {
            $_SESSION['tableau'][1] = $_SESSION['game'][$_GET['lien']];

        }
    } 
}
else {
    // Création d'une session qui contient un tableau vide.
    $_SESSION['game'] = [];
    // Boucle pour générer mes cartes.
    for($j=0; $j<6; $j++) {
        // Création d'un tableau qui est incrémenté par ma boucle qui stocke mon objet(instance de ma classe Card qui a en paramètre mon compteur $j)
        $tableau['game'][$j] = new Carte($j);
        // $tableau['game'][2][$j] = new Carte($j);
        // Je stocke mon tableau dans une session GAME
        $_SESSION['game'] = $tableau['game'];
        // var_dump($_SESSION['game']);
    }
    // Je mélange mon tableau.
    shuffle($_SESSION['game']);
}

?>