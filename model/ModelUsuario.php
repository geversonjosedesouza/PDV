<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model\usuario;

class ModelUsuario {

    private $dados = [];

    public function __construct($usua_nome, $usua_senha) {
        $this->dados['$usua_nome'] = $usua_nome;
        $this->dados['$usua_senha'] = $usua_senha;
    }

    public function __set($indice, $valor) {
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice) {
        return $this->dados[$indice];
    }

}
