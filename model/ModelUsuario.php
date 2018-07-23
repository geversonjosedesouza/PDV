<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model\us;

class ModelUsuario {

    private $dados = [];

    public function __construct($user, $pass) {
        $this->dados['user'] = $user;
        $this->dados['pass'] = $pass;
    }

    public function __set($indice, $valor) {
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice) {
        return $this->dados[$indice];
    }

}
