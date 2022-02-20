<?php
Class Carte {

    public $etat = 'close';
    public $valeur;

    public function __construct($valeur) 
    {
        $this->valeur = $valeur;
    }

    public function openEtatCarte() 
    {
        $this->etat = 'open';
    } 

    public function game($nb_carte)
    {
        for($i=0; $i<$nb_carte; $i++) {
// Si ma session (objet) sont état est à CLOSE,
            if($_SESSION['game'][$i]->etat == 'close') {
// j'echo mes cartes retournées qui prennent comme lien GET mon compteur $i(boucle FOR)                 
                echo "<a href='memory.php?lien=$i'><div class='cartes'><img src='../assets/img/dos.png'></div></a>"; 
            }
// Sinon je stocke dans une variable ma session avec sa valeur qui me permet de donner les même valeurs à mes images.
            else {
                $valcard = $_SESSION['game'][$i]->valeur;
                echo "<div class='cartes'><img src='../assets/img/$valcard.png'></div>";  
            }   
        }
    }
}
?>