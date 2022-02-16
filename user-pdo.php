<?php

class Userpdo{

    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO(

                "mysql:host=localhost; 
                dbname=classes; 
                charset=utf8",
                "root", 
                "root");
        }
        catch(PDOException $e) {

            die('Erreur :'.$e->getMessage());

            echo "Impossible de se connecter!";
        }
    }


    public function register($login, $password, $email, $firstname, $lastname)
    {

        $register = $this->bdd->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login', '$password', '$email', '$firstname', '$lastname')");
        $array = [':login'=>$login, ':password'=>$password, ':email'=>$email, ':firstname'=>$firstname, ':lastname'=>$lastname];
        $register->execute($array);
    }


    public function connect($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        $connect = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
        $connect->execute(array($login, $password));
       
        $rescount = $connect->rowCount();
        if ( $rescount == 1) {
            session_start();

            $res = $connect->fetch();
            $_SESSION['id'] = $res['id'];

            echo 'Connexion réussie';
            header('Location: accueil-user-pdo.php');
        }

    }


    public function disconnect()
    {
        session_destroy();
    }


    public function delete($login)
    {
        $delete = $this->bdd->prepare("DELETE FROM utilisateurs WHERE login => ':login' ");
        $array = [':login'=>$login];
        $delete->execute($array);

        session_destroy();
    }


    public function update($login, $password, $email, $firstname, $lastname)
    {

        if (!empty($_POST['prenom'])) {
            $prenomlenght = strlen($_POST['prenom']);
            if ($prenomlenght >= 2 && $prenomlenght <= 18) {
                $inserprenom = $this->bdd->prepare("UPDATE utilisateurs SET firstname = ? WHERE id = ?");
                $inserprenom->execute(array($firstname, $_SESSION['id']));
            }
        }

        if (!empty($_POST['nom'])) {
            $nomlenght = strlen($_POST['nom']);
            if ($nomlenght >= 2 && $nomlenght <= 18) {
                $insernom = $this->bdd->prepare("UPDATE utilisateurs SET lastname = ? WHERE id = ?");
                $insernom->execute(array($lastname, $_SESSION['id']));
            }
        }

        if (!empty($_POST['email'])) {
            $getlogin = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
            $getlogin->execute(array($email));
            $logincount = $getlogin->rowCount();
            if ($logincount == 0) {
                $inserlogin = $this->bdd->prepare("UPDATE utilisateurs SET email = ? WHERE id = ?");
                $inserlogin->execute(array($login, $_SESSION['id']));
            }
        }

        if (!empty($_POST['login'])) {
            $loginlenght = strlen($_POST['login']);
            if ($loginlenght >= 2 && $loginlenght <= 18) {
                $getlogin = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
                $getlogin->execute(array($login));
                $logincount = $getlogin->rowCount();
                if ($logincount == 0) {
                    $inserlogin = $this->bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
                    $inserlogin->execute(array($login, $_SESSION['id']));
                }
            }
        }

        if (!empty($_POST['password'])) {
            $inserpassword = $this->bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
            $inserpassword->execute(array($password, $_SESSION['id']));
        }
       
    }



    public function isConnected()
    {
        if(isset($_SESSION['id'])){

            return true;

        }else{

            return false;
        }
    }


    public function getAllInfo()
    {
        $session_id = $_SESSION['id'];

        $getAllInfo = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE id = '$session_id' ");
        $getAllInfo->execute();
        $getAllInfos = $getAllInfo->fetch();
        return $getAllInfos;
    }


    public function getLogin()
    {
        $session_id = $_SESSION['id'];

        $getLogin = $this->bdd->prepare("SELECT login FROM utilisateurs WHERE id = ' $session_id ' ");
        $getLogin->execute();
        $res = $getLogin->fetchAll();
        return $res;

    }


    public function getEmail()
    {
        $session_id = $_SESSION['id'];

        $getEmail = $this->bdd->prepare("SELECT email FROM utilisateurs WHER id = ' $session_id ' ");
        $getEmail->execute();
        $res = $getEmail->fetchAll();
        return $res;

    }


    public function getFirstname()
    {
        $session_id = $_SESSION['id'];

        $getFirstname = $this->bdd->prepare("SELECT firstname FROM utilisateurs WHERE id = ' $session_id ' ");
        $getFirstname->execute();
        $res = $getFirstname->fetchAll();
        return $res;

    }

    public function getLastname()
    {
        $session_id = $_SESSION['id'];

        $getLastname = $this->bdd->prepare("SELECT lastname FROM utilisateurs WHERE id= ' $session_id ' ");
        $getLastname->execute();
        $res = $getLastname->fetchAll();
        return $res;
    }
}
?>