<?php
session_start();
require '../../classes/User.php';
// Instanciaton de la class User
$user = new User();

if(isset($_SESSION['login'])) {
    if(isset($_POST['buttonL'])) { 
        $user->updateLogin($_POST["login"]);
    }
    elseif(isset($_POST['buttonP'])) {
        $user->updatePassword($_POST["password_old"], $_POST["password"], $_POST["password2"]);
    }
}
?>