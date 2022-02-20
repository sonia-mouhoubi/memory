<?php 
session_start();
require '../../classes/User.php';
$user = new User();

if(isset($_POST['button'])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    if(isset($login) && isset($password)) {
        $user->connect($login, $password);
    }
}
?>