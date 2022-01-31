<?php
session_start();
require 'Cartes.php';

if(!isset($_GET['lien'])) {
    if(isset($_SESSION['game'])) {
        // var_dump($_SESSION['game'][$_GET['id']]);

    }
    else {
        $_SESSION['game'] = [];
        for($i=1; $i<=3; $i++) {
            $tab['game'][$i] = new Carte($i);
            var_dump($tab['game'][$i]);
        }
        $table = $tab['game'];
        $_SESSION['game'] = array_merge($tab['game'], $table);
        shuffle($_SESSION['game']);

        // var_dump($_SESSION['game']);


    }
}

// // Carte coté DOS
// $dosCarte1 = new Carte();
// $dosCarte2 = new Carte();
// $dosCarte3 = new Carte();
// $dosCarte4 = new Carte();
// $dosCarte5 = new Carte();
// $dosCarte6 = new Carte();
// // Carte coté FACE
// $faceCarte1 = new Carte();
// $faceCarte2 = new Carte();
// $faceCarte3 = new Carte();
// $faceCarte4 = new Carte();
// $faceCarte5 = new Carte();
// $faceCarte6 = new Carte();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Jeux du Mémory</title>
        <meta name="description" content="Jeux du mémory en php.">
       
        <link href="styles/css/css.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <section class="jeux">
                <h1>Accueil</h1>
                <!-- <form action="" method="post">
                    <label for="jeux">Choisisez le nombres de cartes pour commencer à jouer.</label>

                    <select name="jeux" id="jeux">
                        <option value="6cartes">6 cartes</option>
                        <option value="8cartes">8 cartes</option>
                        <option value="10cartes">10 cartes</option>
                        <option value="12cartes">12 cartes</option>
                        <option value="14cartes">14 cartes </option>
                    </select>

                    <input type="submit" id="button" name="button">
                </form> -->

                <div class="container container1">
                <?php
                for($j=0; $j<6; $j++)  {
                    // var_dump($_SESSION['game'][$j]);
                    echo "<a href='index.php?id=$j'><div class='cartes'>X</div></a>"; 

                }

                // echo "<a href='index.php?lien=carte2'>$carteDos2</a>"; 
                // echo "<a href='index.php?lien=carte3'>$carteDos3</a>"; 
                // echo "<a href='index.php?lien=carte4'>$carteDos4</a>"; 
                // echo "<a href='index.php?lien=carte5'>$carteDos5</a>"; 
                // echo "<a href='index.php?lien=carte6'>$carteDos6</a>"; 

                ?>   
                </div>
            </section>
        </main>
        <footer>
            <a href="">GITHUB</a>
        </footer>
    </body>
</html>