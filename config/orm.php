<?php 

function json_array():array
{
    $dataJson = file_get_contents(PATH_BD);
    $data = json_decode($dataJson,true);
    return $data;
}

function array_json($key,$array)
{
    $data = json_array();
    array_push($data[$key],$array);
    $empData = json_encode($data,JSON_PRETTY_PRINT);
    file_put_contents(PATH_BD,$empData);
}