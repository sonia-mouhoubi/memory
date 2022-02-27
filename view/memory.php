<?php
require ('../traitements/page-traitement/traitement-memory.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Jeu du Mémory</title>
        <meta name="description" content="Accueil - Jeu du Memory">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css.css" rel="stylesheet">
    </head>
    <body> 
        <?php require ('require/header.php'); ?>         
        <main>
            <section class="jeux">
                <h1>Jeu du Memory</h1>
                <div class='form-jeux'>
                    <form action="../traitements/form-traitement/form-memory.php" method="post">
                        <label for="nb_carte">Choisir entre 3 et 12 paires.</label>
                        <input type="number" id="paire_carte" name="paire_carte" min="3" max="12">
                        <input type="submit" id="jouer" name="jouer" value="JOUER">
                    </form> 

                    <form action="../traitements/form-traitement/form-memory.php" method="post">
                        <input type="submit" id="rejouer" name="rejouer" value="REJOUER">
                    </form> 
                </div>
                <!-- <img src="../assets/img/fond-memory.png" alt=""> -->
                <div class="container-cards">
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
                    if(isset($_SESSION['tableau'][1]) && isset($_SESSION['tableau'][2])) {
                        $_SESSION['tableau'][1]->etat = 'close';
                        $_SESSION['tableau'][2]->etat = 'close';
                    
                        $_SESSION['coup']++; // 
                        unset($_SESSION['tableau']);
                    } 
                    ?> 
                </div>
                <?php 
                    if(isset($_SESSION['coup'])) {
                        echo '<div class="score-game"><p> Coup : '.$_SESSION['coup'].'</p>';
                    }
                    if(isset($_SESSION['nbPaire'])) {
                        echo '<p> Nombre de paire trouvée : '.$_SESSION['nbPaire'].'</p>';
                    }
                    if(isset($_SESSION['level'])) {
                        echo '<p> Level : '.$_SESSION['level'].' paires </p>';
                    }
                    if(isset($_SESSION['point'])) {
                        echo '<p> Points : '.$_SESSION['point'].'</p>';
                    }
                    if(isset($_SESSION['msgEndGame'])) {
                        echo $_SESSION['msgEndGame'].'</div>';
                    } 
                ?>
            </section>
        </main>  
        <?php require('require/footer.php'); ?>         
    </body>
</html>
