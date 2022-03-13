<?php

require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");

function lister_joueurs($page){
    $data = json_array();
    $nbrElements =0;
    $users = [];
    foreach ($data["users"] as $key => $value) {
        if ($value['role'] == "JOUEUR") {
            $users []= $value;
            $nbrElements ++;
        }
    }
    if ($nbrElements < 15) {
        $nbrElementsPage = $nbrElements;
    } else {
        $nbrElementsPage = 15;
    }
    $nbrPages = ceil($nbrElements/$nbrElementsPage);
    if ($page > $nbrPages) {
        $page = $nbrPages;
    }
    if ($page == 1) {
        $premierElement = 0;
        $dernierElement = $nbrElementsPage;
    } else {
        $premierElement = ($page-1)*$nbrElementsPage;
        $dernierElement = $premierElement + $nbrElementsPage;
    }
    if ($dernierElement > $nbrElements) {
        $dernierElement = $nbrElements;
    }
    

    echo "<table>";
        echo "<tr>";
            echo "<th>Prenom</th>";
            echo "<th>Nom</th>";
            echo "<th>Score</th>";
        echo "</tr>";
        for ($i=$premierElement; $i < $dernierElement; $i++) { 
            $user = $users[$i];
            echo "<tr>";
                    echo "<td>".$user['prenom']."</td>";
                    echo "<td>".$user['nom']."</td>";
                    echo "<td>".$user['score']."</td>";
            echo "</tr>";
        }
    echo "</table>";
    return $nbrPages;
}

function lister_questions($page,$nbrElementsPage)
{
    $data = json_array();
    $nbrElements =count($data["questions"]);
    $nbrPages = ceil($nbrElements/$nbrElementsPage);
    if ($page > $nbrPages) {
        $page = $nbrPages;
    }
    if ($page == 1) {
        $premierElement = 0;
        $dernierElement = $nbrElementsPage;
    } else {
        $premierElement = ($page-1)*$nbrElementsPage;
        $dernierElement = $premierElement + $nbrElementsPage;
    }
    if ($dernierElement > $nbrElements) {
        $dernierElement = $nbrElements;
    }
    echo "<ol start = ".($premierElement + 1).">";
        for ($i=$premierElement; $i < $dernierElement; $i++) { 
            $question = $data["questions"][$i];
            echo "<li>".$question['question']."</li>";
            if (count($question['reponses']) == 1) {
                echo '<span class="typettext">'.$question['reponses'][0].'</span>';
            }else {
                echo "<ul>";
                if (count($question['correct']) == 1) {
                    foreach ($question['reponses'] as $value) {
                        echo '<li class="typeradio">'.$value."</li>";
                    }
                } else {
                    foreach ($question['reponses'] as $value) {
                        echo '<li class="typecheckbox">'.$value."</li>";
                    }
                }
                echo "</ul>";
            }
        }
    echo "</ol>";
    return $nbrPages;
}

function print_right($adresse)
{
    ob_start();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR.$adresse.".html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}

function ajouter_admin(){
    ob_start();
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."subscribe.html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}

function login_player($login,$password)
{
    if (champ_rempli($login) || champ_rempli($password) ) {
        if (valide_login($login) && valide_password($password)) {
            $user = authentificate($login,$password);
            if (count($user) != 0) {
                $_SESSION[USER_KEY] = $user ; 
                header("location:".WEBROOT."?controller=user&action=accueil");
                exit();
            }else {
                $_SESSION['errorauth'] = "login ou mot de passe invalid";
                header("location:".WEBROOT);
                exit();
            }
        }
        header("location:".WEBROOT);
        exit();
    } else {
        header("location:".WEBROOT);
        exit();
    }
    
}

function save_img()
{
    $uploadsdir = ROOT."public".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR;
    $avatar = $_FILES['avatar']['name'];
    $extention = pathinfo($avatar,PATHINFO_EXTENSION);

    if ($extention == 'jpg' || $extention == 'png' || $extention == 'gif' || $extention == 'jpeg' && $avatar = $_FILES['avatar']['name'] <= 100000) {

        $prefixeEmail = explode('@',$_POST['loginsub']);
        $newName = $prefixeEmail[0].".".$extention;
        $uploadimg = $uploadsdir.basename($newName);
        move_uploaded_file($_FILES['avatar']['tmp_name'],$uploadimg);
        return $newName;
    }
    return "";
}

function subscribe_player($login,$password,$firstName,$lastName,$avatar)
{            
    if (champ_rempli($login) || champ_rempli($password) || champ_rempli($firstName) || champ_rempli($lastName) || $avatar != null) {
        if (valide_login($login) && valide_password($password) && valid_nom($firstName) && valid_nom($lastName)) {
            if (!login_present($login)) { 
                subscribe($login,$password,$firstName,$lastName,"JOUEUR",$avatar);
                header("location:".WEBROOT."?controller=securite&action=inscription"."&true=true");
                exit();
            }else {
                $_SESSION['error'] = '';
                $_SESSION['loginpresent'] = 'login deja existant !!!';
                header("location:".WEBROOT."?controller=securite&action=inscription");
                exit();
            }
        }
        $_SESSION['error'] = '';
        header("location:".WEBROOT."?controller=securite&action=inscription");
        exit();
    } else {
        header("location:".WEBROOT."?controller=securite&action=inscription");
        exit();
    }
}

function subscribe_admin($login,$password,$firstName,$lastName,$avatar)
{
    if (champ_rempli($login) || champ_rempli($password) || champ_rempli($firstName) || champ_rempli($lastName) || $avatar != null) {
        if (valide_login($login) && valide_password($password) && valid_nom($firstName) && valid_nom($lastName)) {
            if (!login_present($login)) { 
                subscribe($login,$password,$firstName,$lastName,"ADMIN",$avatar);
                header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.admin&true=true");
                exit();
            }else {
                $_SESSION['error'] = '';
                $_SESSION['loginpresent'] = 'login deja existant !!!';
                header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.admin");
                exit();
            }
        }
        $_SESSION['error'] = '';
        header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.admin");
        exit();
    } else {
        header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.admin");
        exit();
    }
}

function deconnexion()
{
    session_destroy();
    unset($_SESSION[USER_KEY]);
    header("location:".WEBROOT);
    exit();
}

function lister_question_nbr_elements($value) {
    if (trim($value) != "" && is_numeric($value) && $value >=1 ) {
        $_SESSION['nbrElementsPage'] = $value;   
    }
    header("location:".WEBROOT."?controller=user&action=accueil&choice=lister.questions&page=1");
    exit();
}

function subscribe_question($question,$nbrpts,$reponses,$correct)
{
    if (champ_rempli($question) && champ_rempli($nbrpts) && isset($reponses) && isset($correct)) {
        $newReponses = array_rempli($reponses);
        $newCorrect = array_rempli($correct);
        if ($_POST['typerep'] == 'text') {
            $newReponses = ["<input disabled>"];
        }
        if (valid_nombre($nbrpts) && count($newReponses) != 0 && count($newCorrect) != 0) {
            $_SESSION['true'] = "true";
            new_question($question,$nbrpts,$newReponses,$newCorrect);
            header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.question");
            exit();
        } else {
            $_SESSION['errorquestion'] = "veuillez remplir correctement les champs";
            header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.question");
            exit();
        }
    }
    header("location:".WEBROOT."?controller=user&action=accueil&choice=ajouter.question");
    exit();
}