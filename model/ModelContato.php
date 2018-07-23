<?php
namespace model\co;
ini_set('display_errors', 1);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelContato {

    private $dados = [];

    public function __construct($nome, $email) {
        $this->dados['nome'] = $nome;
        $this->dados['email'] = $email;
    }

    public function __set($indice, $valor) {
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice) {
        return $this->dados[$indice];
    }

}