<?php
session_start();
Class Carte {

    public $dos;
    public $face;

    // public function __construct($dos, $face) 
    // {
    //     $this->dos = $dos;
    //     $tis->face = $face;
    // }

    public function carte_aleatoire() {
        
    }

    public function faceCarte($face) {
        $faceCarte = $this->face = $face;
        $carteRetournee = "<div class='cartes'>$faceCarte</div>";
        return $carteRetournee;
    }

    public function dosCarte() {
        // $lien2 = $this->faceCarte($face);
        // $this->dos;
        // $dos = "<a href='index.php?lien='><div class='cartes'>CARTE</div></a>";
        $dos = "<div class='cartes'>CARTE</div>";

        return $dos;

    } 

    // public function retourneCarte() {
    //     $retourneCarte = $this->faceCarte();
        
    // return $retourneCarte;
    // }
}

?>