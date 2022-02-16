<?php
    session_start();

    require 'user-pdo.php';
        $user = new Userpdo();

    if(isset($_SESSION['id'])) {
        echo 'Bonjour '.$_SESSION['id'];
    }

    if (isset($_POST['deconnect'])) {

        // Selectioner les utilisateurs qui on le login que l'utilisateur a rentrer dans le formulaire  
        $user->disconnect();

        header('Location: connexion-user-pdo.php');
    }

    if(isset($_POST['supprimer'])){

        $user->delete($login);

        header('Location: connexion-user-pdo.php');
    }
?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/styles.css" rel="stylesheet" type="text/css">
            <title>Document</title>   
        </head>

        <body>
            <?php require 'header.php'?>
            <main>
                <section>
                    <h1>Accueil</h1>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <form action="" method="post">
                        <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
                    </form> 

                    <form action="" method="post">
                        <input type="submit" id="supprimer" name="supprimer" value="Supprimer">
                    </form>
                </section>
            </main>
            
        <footer>
        </footer>

        </body>
    </html>  
    
