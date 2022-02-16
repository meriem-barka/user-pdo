<?php
session_start();

require 'user-pdo.php';
    $user = new Userpdo();
    
    if (isset($_SESSION['id'])){
        
       $row = $user->getAllInfo();

    }

    //Modification
    if (isset($_POST['modifier'])) {
        
        $user->update($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
        var_dump( $user);
    
       
    }

?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Création d'un site web de réservation de salles">
            <titre>Profil</titre>
        </head>

        <body>
            <?php require 'header.php'?>
            <main>
                <section>
                    <h1></h1>
                    <form action="#"  method="post">

                        <label for="login">Login :</label><br>
                        <input type="text" id="login" name="login" value=""><br>

                        <label for="password">Password :</label><br>
                        <input type="text" id="password" name="password" value=""><br><br>

                        <label for="email">Email :</label><br>
                        <input type="text" id="email" name="email" value="@gmail.com"><br>

                        <label for="firstname">Firs Name :</label><br>
                        <input type="text" id="firstname" name="firstname" value=""><br><br>

                        <label for="lastname">Last Name :</label><br>
                        <input type="text" id="lastname" name="lastname" value=""><br><br>

                        <input type="submit" id="modifier" name="modifier" value="Modifier">
                    </form><br>

                    <form action="" method="post">
                        <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
                    </form> 

                </section>  
            </main> 
        </body>
    </html>  