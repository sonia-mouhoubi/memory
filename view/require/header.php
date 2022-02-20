<?php
// session_start();
require '../classes/User.php'; 
$user = new User();
?>
<nav>
    <a href="accueil.php">Accueil</a>
    <a href="wall-of-fame.php">Wall-of-fame</a>
    <a href="inscription.php">Inscription</a>
    <a href="connexion.php">Connexion</a> 
    
<?php if(isset($_SESSION['login'])) { ?> 
    <a href="memory.php">Memory</a>
    <a href="profil.php">Profil</a>   
     
    <form action="../traitements/form-traitement/form-header.php" method="post">
        <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
    </form> 
<?php }?>
</nav

<?php
// Message de bienvenue pour l'utilisateur connecté
$user->message();
?>