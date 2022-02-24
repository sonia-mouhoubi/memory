<?php session_start();
require '../classes/Score.php';
$score = new Score;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wall of fame - Jeux du Mémory</title>
        <meta name="description" content="Jeux du mémory en php.">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css.css" rel="stylesheet">
    </head>
    <body class='body-walloffame'>
        <?php require 'require/header.php';?>
        <main>
            <section class='wall-of-fame'>
                <h1>Top 10 des meilleurs scores</h1>

                <?php 
                foreach($score->getAllInfos() as $value) {
                    echo '<div>';
                    echo '<p>Date : <span>'.$value['date'].'</span></p>';  
                    echo '<p>Joueur : <span>'.$value['login'].'</span></p>';
                    echo '<p>Point : <span>'.$value['point'].'</span></p>';
                    echo '<p>Niveau : <span>'.$value['level'].'</span></p>';
                    echo '<p>Coup : <span>'.$value['coup'].'</span></p>';  
                    echo '</div>';
                }
                ?>
            </section>
        </main>
        <?php require 'require/footer.php';?>
    </body>
</html>

