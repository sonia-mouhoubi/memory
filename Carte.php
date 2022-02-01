<?php
Class Carte {

    public $etat = 'close';
    private $valeur;
    private $id;

    public function __construct($valeur) 
    {
        $this->valeur = $valeur;
    }

    public function melange_carte($cartes) 
    {
        return shuffle($cartes);   
    }

    // public function setEtatCarte() 
    // {
    //     for($i=1; $i<=3; $i++)  {
    //         echo "<a href='index.php?lien=".$this->id."'><div class='cartes'><img src='img/dos.png'></div></a>";
    //     };
    //     // return $this->valeur;
        
    // }
    public function getEtatCarte() 
    {
        return $this->etat;
    } 

    public function openEtatCarte() 
    {
        $this->etat = 'open';
    } 
}

?>