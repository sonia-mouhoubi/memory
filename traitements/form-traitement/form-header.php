<?php 
require '../../classes/User.php'; 
session_start();

if(isset($_POST['deconnect'])) {
    $user = new User();
    $user->disconnect();
    header("Location: ../../view/accueil.php");
} 
?>