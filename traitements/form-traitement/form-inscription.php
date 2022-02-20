<?php
require '../../classes/User.php';
$user = new User();
if(isset($_POST['button'])) {
    // Sécurisé mes données avec la fonction valid_donnees. 
    $login = $_POST["login"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $reqLogin = $user->getLogin($_POST['login']); 

    if(isset($login) && isset($password)) {
        // Vérification pour voir si les champs sont vides et msg d'erreur.
        if(empty($login)) {
            header("Location: ../../view/inscription.php?err=emptylogin");
        }
        // Vérifier si le login existe déja.
        elseif(!empty($reqLogin)) {
            header("Location: ../../view/inscription.php?err=loginexit");
        }
        elseif(empty($password)) {
            header("Location: ../../view/inscription.php?err=emptymdp");
        }
        elseif(empty($password2)) {
            header("Location: ../../view/inscription.php?err=emptymdp2");
        }
        elseif($password != $password2) { 
            header("Location: ../../view/inscription.php?err=mdpnotidem");
        } 
        else {
            $user->register($_POST['login'], $_POST['password']);
            header("Location: ../../view/connexion.php");
   
        }

    }
}

?>