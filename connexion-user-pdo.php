<?php

    require 'user-pdo.php';
    session_start();

//Partie Controlleur
    
    if (isset($_POST['connexion'])){

        if (empty($_POST['login']) && empty($_POST['password'])){
            
            echo"les champs sont vide";

        }else {
        // Selectioner les utilisateurs qui on le login que l'utilisateur a rentrer dans le formulaire 
            $user = new Userpdo();
            $user->connect($_POST['login'], $_POST['password']);

            // $_SESSION['login'] = $user->login;
        }
    }

?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Création d'un site web de réservation de salles">
            <titre>Connexion</titre>
        </head>

        <body>
            <?php require 'header.php'?>
            <form action="#"  method="post">

                <label for="login">Login :</label><br>
                <input type="text" id="login" name="login" value="John06"><br>

                <label for="password">Password :</label><br>
                <input type="text" id="password" name="password" value="1234"><br><br>

                <input type="submit" id="connexion" name="connexion" value="Connexion">
            </form>
        </body>
    </html>  
    
    