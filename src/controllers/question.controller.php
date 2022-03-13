<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'ajout':
                $_SESSION['post'] = $_POST;
                if (isset($_POST['correct'])) {
                    subscribe_question($_POST['question'],$_POST['nbrpts'],$_POST['reponse'],$_POST['correct']);
                }else {
                    $_SESSION['errorquestion'] = "veuillez choisir la(les) reponse(s) correcte(s).";
                    header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.question");
                }
                exit();
                break;
            case 'lister':
                lister_question_nbr_elements($_POST['nbrElementsPage']);
                break;
            default:
                die("Error 404");
                break;
        }
        
    }
}

