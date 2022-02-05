<nav>
    <a href="accueil.php">Accueil</a>
    <a href="wall-of-fame.php">Wall-of-fame</a>
    <a href="inscription.php">Inscription</a>
    <a href="connexion.php">Connexion</a> 
    <a href="memory.php">Memory</a>
    <a href="profil.php">Profil</a>    
    
<?php if(isset($_SESSION['login'])) { ?> 
    <form action="../traitements/form-traitement/form-header.php" method="post">
        <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
    </form> 
<?php }?>
</nav