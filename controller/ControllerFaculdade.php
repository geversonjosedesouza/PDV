<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ControllerFaculdade {

    public static function principal() {
        include_once server_path('view/faculdade/faculdade.php');
    }

    public static function exercicioslide() {
        include_once server_path('view/faculdade/dom/exercicioslide.php');
    }
    
    public static function tec_net_2() {
        include_once server_path('view/faculdade/tec_net_2/principal.php');
    }

}
