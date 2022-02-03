<?php
Class Carte {

    public $etat = 'close';
    public $valeur;
    // private $id;

    public function __construct($valeur) 
    {
        $this->valeur = $valeur;
    }

    // public function melange_carte() 
    // {
    //     return shuffle();   
    // }

    // public function setEtatCarte() 
    // {
    //     for($i=1; $i<=3; $i++)  {
    //         echo "<a href='index.php?lien=".$this->id."'><div class='cartes'><img src='img/dos.png'></div></a>";
    //     };
    //     // return $this->valeur;
        
    // }
    // public function getEtatCarte() 
    // {
    //     return $this->valeur;
    // } 

    public function openEtatCarte() 
    {
        $this->etat = 'open';
    } 
    public function suprimeCarte() 
    {
        session_destroy();
    }
}

?>