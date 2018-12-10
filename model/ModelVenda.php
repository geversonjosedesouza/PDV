<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model\venda;

class ModelVenda {

    private $dados = [];

    public function __construct($clie_nome, $clie_cpf) {
        $this->dados['clie_nome'] = $clie_nome;
        $this->dados['clie_cpf'] = $clie_cpf;
    }

    public function __set($indice, $valor) {
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice) {
        return $this->dados[$indice];
    }

}
