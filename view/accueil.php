<?php session_start(); ?>
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
        <?php require 'require/header.php';?>
        <main>
            <section>
                <h1>Accueil</h1>

                <p>Bienvenue chez Memory, Venez jouer au Memory afin de faire travailer votre mémoire.</p>

                <p>Le but du jeux et de trouver le plus rapidemment possible les paires de cartes en moins de coup possible. Quirelèvera le défi !</p>

                <p>Pour pouvoir jouer vos devez vous inscrire : <a href="inscription.php">INSCRIPTION</a></p>

                <p>Qui sont vos rivaux ? <a href="wall-of-fame.php">WALL of FAME</a></p>
            </section>
        </main>
        <?php require 'require/footer.php';?>
    </body>
</html>

