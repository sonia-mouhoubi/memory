<?php
require ('../traitements/page-traitement/traitement-memory.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Jeux du Mémory</title>
        <meta name="description" content="Jeux du mémory en php.">
       
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body>
        <?php require ('require/header.php'); ?>         
        <main>
            <section class="jeux">
                <h1>MEMORY</h1>

                <form action="" method="post">
                    <label for="nb_carte">Choisisez un nombre de paire entre 3 et 12.</label>
                    <input type="number" id="paire_carte" name="paire_carte">
                    <input type="submit" id="jouer" name="jouer" value="JOUER">
                </form> 
                
                <div class="container container1">
                <?php
                // // Si je clique sur JOUER
                // if(isset($_POST['jouer'])) {
                // // Si mon nb de paire est séléctionnée
                //     if(isset($_POST['paire_carte'])) {
                // // Je multiplie mes paires par 2
                //         $nb_carte = $_POST['paire_carte']*2;
                // // Je boucle sur le nb cartes demandée par l'utilisateur
                //         for($i=0; $i<$nb_carte; $i++) {
                // // Si ma session (objet), son état est à CLOSE
                //             if($_SESSION['game'][$i]->etat == 'close') {
                // // J'echo mes cartes retournées qui prennent comme lien GET mon compteur $i(boucle FOR)                 
                //                 echo "<a href='memory.php?lien=$i'><div class='cartes'><img src='../assets/img/dos.png'></div></a>"; 
                //             }
                // // Sinon je stocke dans une variable ma session avec sa valeur qui me permet de donner les même valeurs à mes images.
                //             else {
                //                 $valcard = $_SESSION['game'][$i]->valeur;
                //                 echo "<div class='cartes'><img src='../assets/img/$valcard.png'></div>";  
                //             }   
                //         }
                        
                //     }
                // }

                for($i=0; $i<6; $i++) {
        // Si ma session (objet), son état est à CLOSE
                    if($_SESSION['game'][$i]->etat == 'close') {
        // J'echo mes cartes retournées qui prennent comme lien GET mon compteur $i(boucle FOR)                 
                        echo "<a href='memory.php?lien=$i'><div class='cartes'><img src='../assets/img/dos.png'></div></a>"; 
                    }
        // Sinon je stocke dans une variable ma session avec sa valeur qui me permet de donner les même valeurs à mes images.
                    else {
                        $valcard = $_SESSION['game'][$i]->valeur;
                        echo "<div class='cartes'><img src='../assets/img/$valcard.png'></div>";  
                    }   
        
                }
    
                ?>   
                </div>
            </section>
        </main>
      
    </body>
</html>

