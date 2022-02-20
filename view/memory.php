<?php
require ('../traitements/page-traitement/traitement-memory.php');
// function la_fonction_qui_compte() {
//     $verifiercompteur = 0;
//     $game = $_SESSION['game'];
//     foreach($game as $key => $objets) {
//         if($objets->etat == 'close')
//         $verifiercompteur++;
        
//     }
//     return $verifiercompteur;
// }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Jeu du Mémory</title>
        <meta name="description" content="Accueil - Jeu du Memory">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body> 
        <?php require ('require/header.php'); ?>         
        <main>
            <section class="jeux">
                <h1>Memory</h1>

                <form action="../traitements/form-traitement/form-memory.php" method="post">
                    <label for="nb_carte">Choisisez un nombre de paire entre 3 et 12.</label>
                    <input type="number" id="paire_carte" name="paire_carte" min="3" max="12">
                    <input type="submit" id="jouer" name="jouer" value="JOUER">
                </form> 

                <form action="../traitements/form-traitement/form-memory.php" method="post">
                    <input type="submit" id="rejouer" name="rejouer" value="REJOUER">
                </form> 
                
                <div class="container">
                <?php
                    $game = $_SESSION['game'];
                    // Foreach pour récupèrer l'objet du game
                    foreach($game as $key => $objets) {
                        if($objets->etat == 'close') {
                            echo "<a href='memory.php?lien=$key'><div class='cartes'><img src='../assets/img/dos.png'></div></a>"; 
                        }
                        else {
                        // On récupére de l'objet sa valeur pour afficher les cartes retournées
                            $valcard = $objets->valeur;
                            echo "<div class='cartes'><img src='../assets/img/$valcard.png'></div>";  
                        }   
                    }
                    if(isset($_SESSION['coup'])) {
                        echo '<div> Coup : '.$_SESSION['coup'].'</div>';
                    }
                    if(isset($_SESSION['nbPaire'])) {
                        echo '<div> Nombre de paire trouvée : '.$_SESSION['nbPaire'].'</div>';
                    }
                    if(isset($_SESSION['level'])) {
                        echo '<div> Level : '.$_SESSION['level'].' paires </div>';
                    }
                    if(isset($_SESSION['msgEndGame'])) {
                        echo $_SESSION['msgEndGame'];
                    }
                    if(isset($_SESSION['point'])) {
                        echo '<div> Points : '.$_SESSION['point'].'</div>';
                    }

                ?>   
                </div>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
