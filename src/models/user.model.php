<?php 

function authentificate($login,$password)
{
    $data = json_array();
    foreach ($data["users"] as $user) {
        if ($login == $user["login"] && $password == $user["password"]) {
            return $user;
        }
    }
    return [];
}

function login_present($login)
{
    $data = json_array();
    $users=$data["users"];
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return true;
        }
    }
    return false;
}

function subscribe($login,$password,$firstName,$lastName,$role,$avatar)
{
    $myObj = new stdClass();

    $myObj->nom = $lastName;
    $myObj->prenom = $firstName;
    $myObj->login = $login;
    $myObj->password = $password;
    $myObj->role = $role;
    $myObj->score = 0;
    $myObj->avatar = $avatar;
    return array_json("users",$myObj);
}

function new_question($question,$nbrpts,$reponses,$correct)
{
    $myObj = new stdClass();

    $myObj->question = $question;
    $myObj->nbrpts = $nbrpts;
    $myObj->reponses = $reponses;
    $myObj->correct = $correct;
    return array_json("questions",$myObj);
}
