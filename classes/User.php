<?php
class User {
    private $id;
    private $login;
    private $password;
    private $bdd;

    public function __construct() {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost; dbname=memory; charset=utf8',
                'root',
                '');
        } catch (PDOexeptiion $e) {
            
            die('Erreur :'.$e->getMessage());
        }
    }

    // Fonction pour enregistrer un nouvel utilisateur
    public function register($login, $password) {   
        $this->login = $login;
        $this->password = $password;
        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

        $req = $this->bdd->prepare("INSERT INTO `utilisateurs`( `login`, `password`) VALUES (:login,:password)");
        $req->execute(['login'=>$login, 'password'=>$hashed_password]);
    }
    
    // Fonction pour connecter un utilisateur
    public function connect($login, $password) {
        $req = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login= ?");
        $req->execute([$login]);
        $res = $req->fetchall();
        // Vérif du mdp haché
    //    $password_verify = password_verify($password, $res[0]['password']);
        if(empty($login)) {
            header("Location: ../../view/connexion.php?err=emptylogin");        
        }
        elseif(empty($password)) {
            header("Location: ../../view/connexion.php?err=emptymdp");
        }
        elseif(!empty($res) && password_verify($password, $res[0]['password'])) {  
            $_SESSION['id'] = $res[0]['id'];
            $_SESSION['login'] = $res[0]['login'];
            header("Location: ../../view/accueil.php?msg=connectreussie");
        } 
        else {
            header("Location: ../../view/connexion.php?err=errlogmdp");        
        }
    }
    
    // Fonction pr que le user se déconnecte 
    public function disconnect() {
        unset($_SESSION['game']);
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        unset($_SESSION['msgEndGame']);
        $_SESSION['coup'] = 0;
        $_SESSION['nbPaire'] = 0;
        $_SESSION['level'] = 0;       
    }
   
    public function updateLogin($login) {
        $session_login = $_SESSION['login']; 

        if(!empty($this->getLogin($login)['login']) && $session_login != $login) {
            header("Location: ../../view/profil.php?err=loginexit");
        }
        elseif(empty($login)) {
            header("Location: ../../view/profil.php?err=emptylogin");
        }
        else {
            $req = $this->bdd->prepare("UPDATE utilisateurs SET login = :login WHERE login = '$session_login'");
            $req->execute(['login'=>$login]);
            $_SESSION['login'] = $login;
            header("Location: ../../view/profil.php?msg=modifreussie"); 
        } 
    } 

    public function updatePassword($password_old, $password, $password2) {
        $session_login = $_SESSION['login']; 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

        if(!empty($password_old) && password_verify($password_old, $this->getLogin($session_login)['password'])) { 

            if(!empty($password) && !empty($password2) && $password==$password2) {
                $req = $this->bdd->prepare("UPDATE utilisateurs SET password = :password WHERE login = '$session_login'");
                $req->execute(['password'=>$hashed_password]);
                header("Location: ../../view/profil.php?msg=modifreussie");  
            }
            elseif(empty($password)) {
                header("Location: ../../view/profil.php?err=emptymdp");        
            }
            elseif(empty($password2)) {
                header("Location: ../../view/profil.php?err=emptymdp2");
            } 
            elseif($password != $password2) { 
                header("Location: ../../view/profil.php?err=mdpnotidem");  
            } 
        }
        else {
            header("Location: ../../view/profil.php?err=errmdpold");
        }
    }
    
    // Fonction pour verifier s'il n'y a pas déja un user en bdd
    public function getLogin($login) {
        $this->login = $login;

        $req = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $req->execute(['login'=>$login]);
        $res = $req->fetch();
        return $res;   
    }

    // Fonction qui gère les msg d'erreurs
    public function error() {
        if(isset($_GET['err']) && $_GET['err']=='emptylogin') {
            echo '<p class="msg-error">Le champs login est vide.</p>';
        }
        if(isset($_GET['err']) && $_GET['err']=='loginexit') {
            echo '<p class="msg-error">Le login existe déja.</p>';
        }
        if(isset($_GET['err']) && $_GET['err']=='emptymdp') {
            echo '<p class="msg-error">Le champs mot de passe est vide.</p>';
        }
        if(isset($_GET['err']) && $_GET['err']=='emptymdp2') {
            echo '<p class="msg-error">La confirmation de mot de passe est vide.</p>';
        }
        if(isset($_GET['err']) && $_GET['err']=='mdpnotidem') { 
            echo '<p class="msg-error">La confirmation de mot de passe ne correspond pas au mot de passe.</p>';
        }
        if(isset($_GET['err']) && $_GET['err']=='errlogmdp') { 
            echo '<p class="msg-error">Erreur de login ou de mot de passe.</p>';
        } 
        if(isset($_GET['msg']) && $_GET['msg']=='modifreussie') { 
            echo '<p class="msg-error">Modification réussie.</p>';
        }
        if(isset($_GET['err']) && $_GET['err']=='errmdpold') { 
            echo '<p class="msg-error">Ancien mot de passe incorrect.</p>';
        }
    }
    // Message de bienvenue quand le user est connecté
    public function message() {
        if(isset($_SESSION['login']))
        {
            echo "<p> Bonjour <span class='msg-connect'>".ucfirst($_SESSION['login'])."</span>, vous êtes connecté !</p>";
        }
    }
}
?>

