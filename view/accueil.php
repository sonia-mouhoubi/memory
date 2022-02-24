<?php session_start(); 
require '../classes/Score.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Jeux du Mémory</title>
        <meta name="description" content="Jeux du mémory en php.">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css.css" rel="stylesheet">
    </head>
    <body>
        <?php require 'require/header.php';?>
        <main>
            <section class="section-accueil">
                <h1>Jeux du Memory en ligne</h1>
                <div>
                    <p>Bienvenue chez Memory, Venez jouer au Memory afin de faire travailer votre mémoire tout en vous amusant.</p>

                    <p>Le but du jeux et de trouver toutes les paires de cartes en moins de coup possible. Qui relèvera le défi !</p>

                    <p>Pour pouvoir jouer vos devez vous inscrire : <a href="inscription.php">INSCRIPTION</a></p>

                    <p>Qui sont vos rivaux ? <a href="wall-of-fame.php">WALL of FAME</a></p>
                </div>
                <img src="../assets/img/carte-accueil.png" alt="">
            </section>
        </main>
        <?php require 'require/footer.php';?>
    </body>
</html>

