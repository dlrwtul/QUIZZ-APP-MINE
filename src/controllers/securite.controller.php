<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'connexion':
                $_SESSION['post'] = $_POST;
                login_player($_POST['login'],$_POST['password']);
                break;
            case 'inscription':
                $_SESSION['post'] = $_POST;
                $_SESSION['files'] = $_FILES;
                $avatar = save_img();
                subscribe_player($_POST['loginsub'],$_POST['passwordsub'],$_POST['firstname'],$_POST['lastname'],$avatar);
                exit();
                break;
            default:
                die("Error 404");
                break;
        }
        
    }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'connexion':
                require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
                break;
            case 'inscription':
                require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."subscribe.html.php");
                break;
            case 'deconnexion':
                require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
                deconnexion();
                break;
            default:
                
                break;
        }
        
    } else {
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }
}

