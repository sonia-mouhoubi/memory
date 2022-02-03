<?php
require 'Carte.php';
session_start();

if(isset($_SESSION['game'])) {
    
    if(isset($_GET['lien'])) {
        
        $_SESSION['game'][$_GET['lien']]->openEtatCarte();
    } 
}
else {
    $_SESSION['game'] = [];

    for($j=0; $j<6; $j++) {
        $tableau['game'][$j] = new Carte($j);
        
        $_SESSION['game'] = $tableau['game'];
    }
   
    shuffle($_SESSION['game']);
}


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Jeux du Mémory</title>
        <meta name="description" content="Jeux du mémory en php.">
       
        <link href="styles/css/css.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <section class="jeux">
                <h1>Accueil</h1>
                
                <div class="container container1">
                <?php

                for($i=0; $i<6; $i++)  {
                    if($_SESSION['game'][$i]->etat == 'close') {
                    
                        echo "<a href='index.php?lien=$i'><div class='cartes'><img src='img/dos.png'></div></a>"; 
                    }
                    else {
                        $valcard = $_SESSION['game'][$i]->valeur;
                        echo "<div class='cartes'><img src='img/$valcard.png'></div>";
                        if($valcard == 5 || $valcard == 4) {
                            echo 'paire';
                        }  
                        // var_dump($valcard == 1);
                    }                    
                }
              
                
                
               
                // if($_SESSION['game'][2]->etat == 'open' AND $_SESSION['game'][3]->etat == 'open') {
                //     echo 'PAIRE mouton';
                // }
                // if($_SESSION['game'][4]->etat == 'open' AND $_SESSION['game'][5]->etat == 'open') {
                //     echo 'PAIRE cochon';
                // }
                // var_dump($_SESSION['game'][$i]->valeur == 1);

                //  var_dump($_SESSION['game'][0]); 
                //  var_dump($_SESSION['game']); 

                ?>   
                </div>
            </section>
        </main>
        <footer>
            <a href="">GITHUB</a>
        </footer>
    </body>
</html>

