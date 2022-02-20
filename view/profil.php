<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil - Jeu du Memory</title>
        <meta name="description" content="Profil - Jeu du Memory">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body class="body-profil">
    <?php require ('require/header.php'); 
?>         
        <main>
            <section class="section-profil">
                <h2>Profil</h2>

                <form class="form" action="../traitements/form-traitement/form-profil.php" method="post">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" value="<?php if(isset($_SESSION['login'])) { echo $user->getLogin($_SESSION['login'])['login'];}?>">
                    
                    <input type="submit" id="buttonL" name="buttonL">
                    <!-- Message d'erreur -->
                    <?php $user->error()?>
                </form>
                
                <form class="form" action="../traitements/form-traitement/form-profil.php" method="post">
                    <label for="password_old">Ancien mot de passe</label>
                    <input type="password" id="password_old" name="password_old">

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">

                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" id="password2" name="password2">

                    <input type="submit" id="buttonP" name="buttonP">
                    <!-- Message d'erreur -->
                    <?php $user->error()?>
                </form>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   

