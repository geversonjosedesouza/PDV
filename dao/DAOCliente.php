<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOCliente extends DAOConexao {

    public static function getElementName($clie_nome = "") {
        $query = "SELECT * FROM myboutique.cliente";
        $query .= " WHERE clie_nome=:clie_nome LIMIT 1;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':clie_nome', $clie_nome, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function select() {
        $query = "SELECT * FROM myboutique.cliente";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($clie_pk_id = "") {
        $query = "SELECT * FROM myboutique.cliente WHERE clie_pk_id=:clie_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":clie_pk_id", $clie_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\cliente\ModelCliente $cliente = null, $clie_pk_id = "") {
        if (!is_object($cliente)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE myboutique.cliente SET ";
        $query .= "clie_nome=:clie_nome, ";
        $query .= "clie_cpf=:clie_cpf, ";
        $query .= "clie_endereco=:clie_endereco, ";
        $query .= "clie_telefone=:clie_telefone ";
        $query .= " WHERE clie_pk_id=:clie_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':clie_nome', $cliente->clie_nome, PDO::PARAM_STR);
        $envio->bindParam(':clie_cpf', $cliente->clie_cpf, PDO::PARAM_STR);
        $envio->bindParam(':clie_endereco', $cliente->clie_endereco, PDO::PARAM_STR);
        $envio->bindParam(':clie_telefone', $cliente->clie_telefone, PDO::PARAM_STR);
        $envio->bindParam(':clie_pk_id', $clie_pk_id, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($clie_pk_id = "") {
        $query = "DELETE FROM myboutique.cliente WHERE clie_pk_id=:clie_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":clie_pk_id", $clie_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

    public static function save(model\cliente\ModelCliente $cliente = null) {
        if (!is_object($cliente)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.cliente ";
        $query .= "(clie_nome, clie_cpf, clie_endereco, clie_telefone) ";
        $query .= "VALUES ";
        $query .= "(:clie_nome, :clie_cpf, :clie_endereco, :clie_telefone);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':clie_nome', $cliente->clie_nome, PDO::PARAM_STR);
        $envio->bindParam(':clie_cpf', $cliente->clie_cpf, PDO::PARAM_STR);
        $envio->bindParam(':clie_endereco', $cliente->clie_endereco, PDO::PARAM_STR);
        $envio->bindParam(':clie_telefone', $cliente->clie_telefone, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

}
