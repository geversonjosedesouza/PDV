<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ControllerPrincipal {

    public static function principal() {
        include_once server_path('view/principal/principal.php');
    }

    public static function panelControl() {
        include_once server_path('view/principal/panel_control.php');
    }

}
