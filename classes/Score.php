<?php
Class Score {
    private $id;
    private $level;
    private $coup;
    private $point;
    private $date;

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

    public function registerCoup($date, $level, $coup, $point, $id) {   
        $this->id = $id;
        $this->level = $level;
        $this->coup = $coup;
        $this->point = $point;
        $this->date = $date;

        $req = $this->bdd->prepare("INSERT INTO `scores` (`date`, `level`, `coup`, `point`, `id_utilisateur`) VALUES (:date, :level, :coup, :point, :id)"); 
        $req->execute(['date'=>$date, 'level'=>$level, 'coup'=>$coup, 'point'=>$point, 'id'=>$id]);
    }

    public function getAllInfos() {
        $req = $this->bdd->prepare("SELECT date, login, point, level, coup FROM `scores` INNER JOIN utilisateurs ON utilisateurs.id = scores.id_utilisateur ORDER BY `scores`.`point` DESC LIMIT 10");
        $req->execute();
        $res = $req->fetchAll();
        return $res;   
    } 

    public function getInfosUser($login) {
        $req = $this->bdd->prepare("SELECT date, login, point, level, coup FROM `scores` INNER JOIN utilisateurs ON utilisateurs.id = scores.id_utilisateur  WHERE login = ? ORDER BY `scores`.`point` DESC LIMIT 10");
        $req->execute([$login]);
        $res = $req->fetchAll();
        return $res;   
    } 
}
?>