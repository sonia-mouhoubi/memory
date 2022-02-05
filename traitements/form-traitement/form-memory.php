<?php 
require '../../classes/Carte.php';

if(isset($_POST['jouer'])) {
    if(isset($_POST['nb_carte'])) {
        game($_POST['nb_carte']);
        header("Location: ../../view/memory.php");

    }
}
