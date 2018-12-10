<?php
namespace model\contato;
ini_set('display_errors', 1);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelContato {

    private $dados = [];

    public function __construct($cont_nome, $cont_email) {
        $this->dados['cont_nome'] = $cont_nome;
        $this->dados['cont_email'] = $cont_email;
    }

    public function __set($indice, $valor) {
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice) {
        return $this->dados[$indice];
    }

}