<?php
Class Score {
    private $id;
    private $level;
    private $coup;
    private $point;

    public function __construct() 
    {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost; dbname=memory; charset=utf8',
                'root',
                '');
        } catch (PDOexeptiion $e) {
            
            die('Erreur :'.$e->getMessage());
        }
    }

    public function registerCoup($level, $coup, $point, $id) {   
        $this->id = $id;
        $this->level = $level;
        $this->coup = $coup;
        $this->point = $point;

        $req = $this->bdd->prepare("INSERT INTO `scores`(`level`, `coup`, `point`, `id_utilisateur`) VALUES (:level, :coup, :point, :id)"); 
        $req->execute(['level'=>$level, 'coup'=>$coup, 'point'=>$point, 'id'=>$id]);
    }
}
?>