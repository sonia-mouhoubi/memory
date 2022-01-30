<?php
require 'Cartes.php';
// Carte coté DOS
$dosCarte1 = new Carte();
$dosCarte2 = new Carte();
$dosCarte3 = new Carte();
$dosCarte4 = new Carte();
$dosCarte5 = new Carte();
$dosCarte6 = new Carte();
// Carte coté FACE
$faceCarte1 = new Carte();
$faceCarte2 = new Carte();
$faceCarte3 = new Carte();
$faceCarte4 = new Carte();
$faceCarte5 = new Carte();
$faceCarte6 = new Carte();
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
                $carteDos1 = $dosCarte1->dosCarte();
                $carteDos2 = $dosCarte2->dosCarte();
                $carteDos3 = $dosCarte3->dosCarte();
                $carteDos4 = $dosCarte4->dosCarte();
                $carteDos5 = $dosCarte5->dosCarte();
                $carteDos6 = $dosCarte6->dosCarte();

                if(isset($_GET['lien']) && $_GET['lien']=='lien1') {
                    echo $faceCarte1->faceCarte("coucou");
                } 
                if(isset($_GET['lien']) && $_GET['lien']=='lien2') {
                    echo $faceCarte1->faceCarte("coucou");
                }
                if(isset($_GET['lien']) && $_GET['lien']=='lien3') {
                    echo $faceCarte1->faceCarte("sonia");
                }
                if(isset($_GET['lien']) && $_GET['lien']=='lien4') {
                    echo $faceCarte1->faceCarte("sonia");
                }
                if(isset($_GET['lien']) && $_GET['lien']=='lien5') {
                    echo $faceCarte1->faceCarte("chapeau");
                }
                if(isset($_GET['lien']) && $_GET['lien']=='lien6') {
                    echo $faceCarte1->faceCarte("chapeau");
                }  

                echo "<a href='index.php?lien=lien1'>$carteDos1</a>"; 
                echo "<a href='index.php?lien=lien2'>$carteDos2</a>"; 
                echo "<a href='index.php?lien=lien3'>$carteDos3</a>"; 
                echo "<a href='index.php?lien=lien4'>$carteDos4</a>"; 
                echo "<a href='index.php?lien=lien5'>$carteDos5</a>"; 
                echo "<a href='index.php?lien=lien6'>$carteDos6</a>"; 

                ?>   
                </div>
            </section>
        </main>
        <footer>
            <a href="">GITHUB</a>
        </footer>
    </body>
</html>