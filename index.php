<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once './conf.php';
include_once './controller/ControllerValidation.php';
include_once './controller/ControllerContato.php';
ini_set('display_errors', 1);

session_start();
if (isset($_SESSION['usuario'])) {
    $us = $_SESSION['usuario'];
}

function menu() {
    include_once server_path("view/principal/menu.php");
}

function access() {
    global $us;
    if (!isset($us)) {
        include_once server_path("view/access.php");
    } else {
        include_once server_path("view/usuario/logon.php");
    }
}

function panel() {
    include_once server_path("view/principal/welcome.php");
}

function pagina_conteudo() {
    global $us;

    if (!validar::validar_option()) {
        if (!isset($us)) {
            include_once server_path("view/principal/principal.php");
        } else {
            include_once server_path("view/principal/panel_control.php");
        }
    }
}

include_once 'view/page.php';
