<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('display_errors', 1);

$GLOBALS['base_url'] = "http://" . $_SERVER['SERVER_NAME'] . "/PDV/";
$GLOBALS['base_server'] = $_SERVER['DOCUMENT_ROOT'] . "/PDV/";

function server_url($caminho = "") {
    return $GLOBALS['base_url'] . $caminho;
}

function server_path($caminho = "") {
    return $GLOBALS['base_server'] . $caminho;
}

function redirect($caminho = "") {
    echo '<script>';
    echo "location.href='$caminho';";
    echo '</script>';
}
