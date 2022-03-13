<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'inscription':
                $_SESSION['post'] = $_POST;
                $_SESSION['files'] = $_FILES;
                $avatar = save_img();
                subscribe_admin($_POST['loginsub'],$_POST['passwordsub'],$_POST['firstname'],$_POST['lastname'],$avatar);
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
        if ($_GET['action'] == 'accueil') {
            if (!is_connected()) {
                header("location:".WEBROOT);
                exit;
            }
            if (isset($_GET['choice'])) {
                switch ($_GET['choice']) {
                    case 'lister.joueurs':
                        print_right("lister.joueurs");
                        break;
                    case 'lister.questions':
                        print_right("lister.questions");
                        break;
                    case 'ajouter.admin':
                        ajouter_admin();
                        break;
                    case 'ajouter.question':
                        print_right("ajouter.question");
                        break;
                    default:
                        print_right("lister.joueurs");
                        break;
                }
            } else {
                print_right("lister.joueurs");
            }
        }
        
    }
}
