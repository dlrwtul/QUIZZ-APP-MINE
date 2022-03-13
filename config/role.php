<?php
define("USER_KEY","userconnect");

function is_connected():bool
{
    return isset($_SESSION[USER_KEY]);
}

function is_admin():bool
{
    if (is_connected()) {
        if ($_SESSION[USER_KEY]['role'] == "ADMIN") {
            return true;
        }
        return false;
    }
}