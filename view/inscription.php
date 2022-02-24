<?php 
session_start();
// require '../classes/User.php'; 
// $user = new User();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription - Jeu du Memory</title>
        <meta name="description" content="Inscription - Jeu du Memory">
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
            <section class="section-inscription">
                <h1>Inscription</h1>

                <form class="form" action="../traitements/form-traitement/form-inscription.php" method="post">

                    <label for="login">Login</label>
                    <input type="text" id="login" name="login">
                    
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">

                    <label for="password2">Mot de passe</label>
                    <input type="password" id="password2" name="password2">

                    <input type="submit" id="button" name="button">
                    <!-- Message d'erreur -->
                    <?php $user->error()?>
                </form>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   

