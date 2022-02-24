<?php
// session_start();
require '../classes/User.php'; 
$user = new User();
// $score = new Score();
?>
<header>
<span class="logo"><a href="accueil.php">Memory</a></span>
    <input type="checkbox" id="burger" hidden>
    <label class="menu-burger" for="burger">
        <span id="span1"></span>
        <span id="span2"></span>
        <span id="span3"></span>
    </label>

    <nav>
      <a href="wall-of-fame.php">Wall-of-fame</a>
    <?php 
    if(!isset($_SESSION['login'])) { ?> 
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a> 
    <?php 
    }
    else { ?>  
        <a href="memory.php">Memory</a>
        <a href="profil.php">Profil</a>   
        
        <form action="../traitements/form-traitement/form-header.php" method="post">
            <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
        </form> 
    <?php }?>
    </nav>

    <?php
    // Message de bienvenue pour l'utilisateur connecté
    $user->message();
    ?>
</header>
