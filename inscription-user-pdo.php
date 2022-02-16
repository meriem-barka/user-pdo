<?php

    require 'user-pdo.php';
    session_start();

    //Partie Controlleur

    if (isset($_POST['inscription'])){
        
        if(empty($_POST['login']) && empty($_POST['password']) && empty($_POST['email']) && empty($_POST['firstname']) && empty($_POST['lastname'])) {
            var_dump("ok");
            echo 'Les champs sont vides';
        }else {
        //Instancer un objet
            $user = new Userpdo();
            $user->register($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
            echo 'Inscription réussie';
            header('Location: connexion-user-pdo.php');
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
            <titre>Inscription</titre>
        </head>

        <body>
            <?php require 'header.php'?>
            <main>
                <section>
                    <form action=""  method="post">

                        <label for="login">Login :</label><br>
                        <input type="text" id="login" name="login" value=""><br>

                        <label for="password">Password :</label><br>
                        <input type="text" id="password" name="password" value=""><br><br>

                        <label for="email">Email :</label><br>
                        <input type="text" id="email" name="email" value=""><br>

                        <label for="firstname">Firs Name :</label><br>
                        <input type="text" id="firstname" name="firstname" value=""><br><br>

                        <label for="lastname">Last Name :</label><br>
                        <input type="text" id="lastname" name="lastname" value=""><br><br>

                        <input type="submit" id="inscription" name="inscription" value="Inscription">
                    </form>
                </section>
            </main>   
            <footer>

            </footer>
        </body>
    </html>  
    