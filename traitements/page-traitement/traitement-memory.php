<?php
require '../classes/Carte.php';
require '../classes/Score.php';
session_start();
$score = new Score; 
$dateGame = new DateTime('NOW', new DateTimeZone('Europe/Paris'));
// Initialisation des sessions
if(!isset($_SESSION['coup'])) {
    $_SESSION['coup'] = 0;
} 
if(!isset($_SESSION['nbPaire'])) {
    $_SESSION['nbPaire'] = 0;
} 
if(!isset($_SESSION['level'])) {
    $_SESSION['level']=0;
} 
if(!isset($_SESSION['point'])) {
    $_SESSION['point'] = 0;
} 

// Si ma session est créé, 
if(isset($_SESSION['game'])) {
    // et que mon lien est cliqué,   
    if(isset($_GET['lien'])) {
        // On récupère de ma session(du coup mon objet) son état OPEN pour pouvoir retourner ma carte.
        $_SESSION['game'][$_GET['lien']]->openEtatCarte();
    
        // Si la session tableau est isset 
        if(isset($_SESSION['tableau'])) {
            // On récupère ds la session de tableau 2 la session GAME et son id
            $_SESSION['tableau'][2] = $_SESSION['game'][$_GET['lien']];
            // Si mon tableau 1 = à mon tableau 2 
            if($_SESSION['tableau'][1]->valeur == $_SESSION['tableau'][2]->valeur) {

                // Les 2 cartes restent open
                $_SESSION['tableau'][1]->etat = 'open';
                $_SESSION['tableau'][2]->etat = 'open';

                $_SESSION['nbPaire']++; // Nb paire trouvé pour savoir qd le jeux est fini
                $_SESSION['coup']++;
                unset($_SESSION['tableau']);

                // Quand les cartes sont toutes retournées
if($_SESSION['nbPaire'] == $_SESSION['nb_carte']) {
    switch($_SESSION['nb_carte']):
        case 3:
            if($_SESSION['coup'] <= 6) {
                $_SESSION['point']+=10;
            }
            elseif($_SESSION['coup'] >= 6) {
                $_SESSION['point']+=2;
            }
            break;
        case 4:
            if($_SESSION['coup'] <= 8) {
                $_SESSION['point']+=20;
            }
            elseif($_SESSION['coup'] >= 8) {
                $_SESSION['point']+=4;
            }
            break;
        case 5:
            if($_SESSION['coup'] <= 10) {
                $_SESSION['point']+=30;
            }
            elseif($_SESSION['coup'] >= 10) {
                $_SESSION['point']+=6;
            }
            break;
        case 6:
            if($_SESSION['coup'] <= 12) {
                $_SESSION['point']+=40;
            }
            elseif($_SESSION['coup'] >= 12) {
                $_SESSION['point']+=8;
            }
            break;
        case 7:
            if($_SESSION['coup'] <= 14) {
                $_SESSION['point']+=50;
            }
            elseif($_SESSION['coup'] >= 14) {
                $_SESSION['point']+=10;
            }
            break;
        case 8:
            if($_SESSION['coup'] <= 16) {
                $_SESSION['point']+=60;
            }
            elseif($_SESSION['coup'] >= 16) {
                $_SESSION['point']-=12;
            }
            break;
        case 9:
            if($_SESSION['coup'] <= 18) {
                $_SESSION['point']+=70;
            }
            elseif($_SESSION['coup'] >= 18) {
                $_SESSION['point']+=14;
            }
            break;
        case 10:
            if($_SESSION['coup'] <= 20) {
                $_SESSION['point']+=80;
            }
            elseif($_SESSION['coup'] >= 20) {
                $_SESSION['point']+=16;
            }
            break;
        case 11:
            if($_SESSION['coup'] <= 22) {
                $_SESSION['point']+=90;
            }
            elseif($_SESSION['coup'] >= 22) {
                $_SESSION['point']+=18;
            }
            break;
        case 12:
            if($_SESSION['coup'] <= 24) {
                $_SESSION['point']+=100;
            }
            elseif($_SESSION['coup'] >= 24) {
                $_SESSION['point']+=20;
            }
            break;
    endswitch;

    $_SESSION['msgEndGame'] = "Partie finie ! Vous avez gagné la partie en ".$_SESSION['coup']." coup.";
    $_SESSION['dateGame'] = $dateGame->format('Y-m-d H:i:s');

    $score->registerCoup($_SESSION['dateGame'], $_SESSION['level'], $_SESSION['coup'], $_SESSION['point'], $_SESSION['id']); 
}
            }  
            // Sinon elles se retournent
        //     else { 
        //         $_SESSION['tableau'][1]->etat = 'close';
        //         $_SESSION['tableau'][2]->etat = 'close';

        //         $_SESSION['coup']++; // 
        //         unset($_SESSION['tableau']);
        //     } 
        }
        else {
            // Création d'une session tableau qui stoque mon game et son id
            $_SESSION['tableau'][1] = $_SESSION['game'][$_GET['lien']];
        }
    }
}        
else {
    // Création d'une session qui contient un tableau vide.
    $_SESSION['game'] = [];
}

// // Quand les cartes sont toutes retournées
// if($_SESSION['nbPaire'] == $_SESSION['nb_carte']) {
//     switch($_SESSION['nb_carte']):
//         case 3:
//             if($_SESSION['coup'] <= 6) {
//                 $_SESSION['point']+=10;
//             }
//             elseif($_SESSION['coup'] >= 6) {
//                 $_SESSION['point']+=2;
//             }
//             break;
//         case 4:
//             if($_SESSION['coup'] <= 8) {
//                 $_SESSION['point']+=20;
//             }
//             elseif($_SESSION['coup'] >= 8) {
//                 $_SESSION['point']+=4;
//             }
//             break;
//         case 5:
//             if($_SESSION['coup'] <= 10) {
//                 $_SESSION['point']+=30;
//             }
//             elseif($_SESSION['coup'] >= 10) {
//                 $_SESSION['point']+=6;
//             }
//             break;
//         case 6:
//             if($_SESSION['coup'] <= 12) {
//                 $_SESSION['point']+=40;
//             }
//             elseif($_SESSION['coup'] >= 12) {
//                 $_SESSION['point']+=8;
//             }
//             break;
//         case 7:
//             if($_SESSION['coup'] <= 14) {
//                 $_SESSION['point']+=50;
//             }
//             elseif($_SESSION['coup'] >= 14) {
//                 $_SESSION['point']+=10;
//             }
//             break;
//         case 8:
//             if($_SESSION['coup'] <= 16) {
//                 $_SESSION['point']+=60;
//             }
//             elseif($_SESSION['coup'] >= 16) {
//                 $_SESSION['point']-=12;
//             }
//             break;
//         case 9:
//             if($_SESSION['coup'] <= 18) {
//                 $_SESSION['point']+=70;
//             }
//             elseif($_SESSION['coup'] >= 18) {
//                 $_SESSION['point']+=14;
//             }
//             break;
//         case 10:
//             if($_SESSION['coup'] <= 20) {
//                 $_SESSION['point']+=80;
//             }
//             elseif($_SESSION['coup'] >= 20) {
//                 $_SESSION['point']+=16;
//             }
//             break;
//         case 11:
//             if($_SESSION['coup'] <= 22) {
//                 $_SESSION['point']+=90;
//             }
//             elseif($_SESSION['coup'] >= 22) {
//                 $_SESSION['point']+=18;
//             }
//             break;
//         case 12:
//             if($_SESSION['coup'] <= 24) {
//                 $_SESSION['point']+=100;
//             }
//             elseif($_SESSION['coup'] >= 24) {
//                 $_SESSION['point']+=20;
//             }
//             break;
//     endswitch;

//     $_SESSION['msgEndGame'] = "Partie finie ! Vous avez gagné la partie en ".$_SESSION['coup']." coup.";
//     $_SESSION['dateGame'] = $dateGame->format('Y-m-d H:i:s');

//     $score->registerCoup($_SESSION['dateGame'], $_SESSION['level'], $_SESSION['coup'], $_SESSION['point'], $_SESSION['id']); 
// }

?>

