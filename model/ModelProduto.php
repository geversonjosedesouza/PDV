<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model\produto;

class ModelProduto {

    private $dados = [];

    public function __construct($prod_nome, $prod_quantidade) {
        $this->dados['prod_nome'] = $prod_nome;
        $this->dados['prod_quantidade'] = $prod_quantidade;
    }

    public function __set($indice, $valor) {
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice) {
        return $this->dados[$indice];
    }

}
