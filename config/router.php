<?php 

if (isset($_REQUEST['controller'])) {
    switch ($_REQUEST['controller']) {
        case 'securite':
            require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."securite.controller.php");
            break;
        case 'user':
            require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."user.controller.php");
            break;
        case 'question':
            require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."question.controller.php");
            break;
        default:
            die("Error 404");
            break;
    }
} else {
    require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."securite.controller.php");
}