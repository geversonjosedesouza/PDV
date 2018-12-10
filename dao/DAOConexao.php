<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAOConexao {

    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $comp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $user = "root";
            $pass = "admin";
            self::$instance = new PDO('mysql:host;localhost;dbname=myboutique;', $user, $pass, $comp);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }

}
