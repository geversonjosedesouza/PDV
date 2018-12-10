<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOPedido extends DAOConexao {

    public static function getElementName($pedi_nome = "") {
        $query = "SELECT * FROM myboutique.pedido";
        $query .= " WHERE pedi_nome=:pedi_nome LIMIT 1;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':pedi_nome', $pedi_nome, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function select() {
        $query = "SELECT * FROM myboutique.pedido";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function selectPedidos() {
        $query = "SELECT pedi_pk_id, clie_nome, pedi_quantidade, pedi_total, pedi_data, pedi_status";
        $query .= " FROM myboutique.pedido INNER JOIN myboutique.cliente ON pedi_fk_cliente = clie_pk_id ORDER BY pedi_pk_id ASC";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($pedi_pk_id = "") {
        $query = "SELECT * FROM myboutique.pedido WHERE pedi_pk_id=:pedi_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":pedi_pk_id", $pedi_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\pedido\ModelPedido $pedido = null, $pedi_pk_id = "") {
        if (!is_object($pedido)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE myboutique.pedido SET ";
        $query .= "pedi_nome=:pedi_nome, ";
        $query .= "pedi_cpf=:pedi_cpf, ";
        $query .= "pedi_endereco=:pedi_endereco, ";
        $query .= "pedi_telefone=:pedi_telefone ";
        $query .= " WHERE pedi_pk_id=:pedi_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':pedi_nome', $pedido->pedi_nome, PDO::PARAM_STR);
        $envio->bindParam(':pedi_cpf', $pedido->pedi_cpf, PDO::PARAM_STR);
        $envio->bindParam(':pedi_endereco', $pedido->pedi_endereco, PDO::PARAM_STR);
        $envio->bindParam(':pedi_telefone', $pedido->pedi_telefone, PDO::PARAM_STR);
        $envio->bindParam(':pedi_pk_id', $pedi_pk_id, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($pedi_pk_id = "") {
        $query = "DELETE FROM myboutique.pedido WHERE pedi_pk_id=:pedi_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":pedi_pk_id", $pedi_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

    public static function save(model\pedido\ModelPedido $pedido = null) {
        if (!is_object($pedido)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.pedido ";
        $query .= "(pedi_fk_cliente, pedi_quantidade, pedi_total, pedi_data, pedi_status) ";
        $query .= "VALUES ";
        $query .= "(:pedi_fk_cliente, :pedi_quantidade, :pedi_total, :pedi_data, :pedi_status);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':pedi_fk_cliente', $pedido->pedi_nome, PDO::PARAM_STR);
        $envio->bindParam(':pedi_quantidade', $pedido->pedi_cpf, PDO::PARAM_STR);
        $envio->bindParam(':pedi_total', $pedido->pedi_endereco, PDO::PARAM_STR);
        $envio->bindParam(':pedi_data', $pedido->pedi_telefone, PDO::PARAM_STR);
        $envio->bindParam(':pedi_status', $pedido->pedi_telefone, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

    public static function retornaUltiID() {
        $query = "SELECT LAST_INSERT_ID()";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchColumn();
    }

}
