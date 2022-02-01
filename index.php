<?php
require 'Carte.php';
session_start();

if(isset($_SESSION['game'])) {
    if(isset($_GET['lien'])) {
        
        $_SESSION['game'][$_GET['lien']]->openEtatCarte();
        // var_dump($_SESSION['game']);
    } 
}
else {
    $_SESSION['game'] = [];

    for($j=1; $j<=3; $j++) {
        $tableau['game'][$j] = new Carte($j);
        $tableau['game'][$j+3] = new Carte($j);
        
        $_SESSION['game'] = $tableau['game'];
        

        // var_dump($tableau['game']);
        // var_dump($tableau['game1']);

        // var_dump($tableau['game']);
    }
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

                for($i=1; $i<=6; $i++)  {
                    if($_SESSION['game'][$i]->etat == 'close') {
                        echo "<a href='index.php?lien=$i'><div class='cartes'><img src='img/dos.png'></div></a>"; 
                    }
                    else {
                        echo "<div id=$i class='cartes'><img src='img/$i.png'></div>";
                    }
                }
                ?>   
                </div>
            </section>
        </main>
        <footer>
            <a href="">GITHUB</a>
        </footer>
    </body>
</html>