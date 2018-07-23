<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class validar {

    public static function validar_option() {
        if (!isset($_GET['page']) || !isset($_GET['option'])) {
            return false;
        }
        $classe = ucfirst($_GET['page']);
        $metodo = $_GET['option'];
        include_once server_path("controller/$classe.php");
        $classe::$metodo();
        return true;
    }

    public static function autorizar() {
        if (!isset($_SESSION['usuario'])) {
            redirect(server_url('?erro=Precisa estar logado'));
        }
    }

    public static function validar_exercicio() {
        if (!isset($_GET['page']) || !isset($_GET['option'])) {
            return false;
        }
        $classe = ucfirst($_GET['page']);
        $metodo = $_GET['option'];
        include_once server_path("controller/$classe.php");
        $classe::$metodo();
        return true;
    }

}
