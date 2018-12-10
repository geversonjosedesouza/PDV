<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOVenda extends DAOConexao {

    public static function getElementName($vend_nome = "") {
        $query = "SELECT * FROM myboutique.venda";
        $query .= " WHERE vend_nome=:vend_nome LIMIT 1;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':vend_nome', $vend_nome, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function select() {
        $query = "SELECT * FROM myboutique.venda";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function selectVendas() {
        $query = "SELECT vend_pk_id, vend_quantidade, vend_subtotal, vend_data, clie_nome";
        $query .= " FROM myboutique.venda INNER JOIN myboutique.cliente ON clie_pk_id = vend_fk_cliente";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($vend_pk_id = "") {
        $query = "SELECT * FROM myboutique.venda WHERE vend_pk_id=:vend_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":vend_pk_id", $vend_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\venda\ModelVenda $venda = null, $vend_pk_id = "") {
        if (!is_object($venda)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE myboutique.venda SET ";
        $query .= "vend_nome=:vend_nome, ";
        $query .= "vend_cpf=:vend_cpf, ";
        $query .= "vend_endereco=:vend_endereco, ";
        $query .= "vend_telefone=:vend_telefone ";
        $query .= " WHERE vend_pk_id=:vend_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':vend_nome', $venda->vend_nome, PDO::PARAM_STR);
        $envio->bindParam(':vend_cpf', $venda->vend_cpf, PDO::PARAM_STR);
        $envio->bindParam(':vend_endereco', $venda->vend_endereco, PDO::PARAM_STR);
        $envio->bindParam(':vend_telefone', $venda->vend_telefone, PDO::PARAM_STR);
        $envio->bindParam(':vend_pk_id', $vend_pk_id, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($vend_pk_id = "") {
        $query = "DELETE FROM myboutique.venda WHERE vend_pk_id=:vend_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":vend_pk_id", $vend_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

    public static function save(model\venda\ModelVenda $venda = null) {
        if (!is_object($venda)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.venda ";
        $query .= "(vend_nome, vend_cpf, vend_endereco, vend_telefone) ";
        $query .= "VALUES ";
        $query .= "(:vend_nome, :vend_cpf, :vend_endereco, :vend_telefone);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':vend_nome', $venda->vend_nome, PDO::PARAM_STR);
        $envio->bindParam(':vend_cpf', $venda->vend_cpf, PDO::PARAM_STR);
        $envio->bindParam(':vend_endereco', $venda->vend_endereco, PDO::PARAM_STR);
        $envio->bindParam(':vend_telefone', $venda->vend_telefone, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

}
