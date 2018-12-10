<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOProduto extends DAOConexao {

    public static function getElementName($prod_nome = "") {
        $query = "SELECT * FROM myboutique.produto";
        $query .= " WHERE prod_nome=:prod_nome LIMIT 1;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':prod_nome', $prod_nome, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function select() {
        $query = "SELECT * FROM myboutique.produto";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($prod_pk_id = "") {
        $query = "SELECT * FROM myboutique.produto WHERE prod_pk_id=:prod_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":prod_pk_id", $prod_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\produto\ModelProduto $produto = null, $prod_pk_id = "") {
        if (!is_object($produto)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE myboutique.produto SET ";
        $query .= "prod_nome=:prod_nome, ";
        $query .= "prod_quantidade=:prod_quantidade, ";
        $query .= "prod_imagem=:prod_imagem, ";
        $query .= "prod_valor=:prod_valor ";
        $query .= " WHERE prod_pk_id=:prod_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':prod_nome', $produto->prod_nome, PDO::PARAM_STR);
        $envio->bindParam(':prod_quantidade', $produto->prod_quantidade, PDO::PARAM_STR);
        $envio->bindParam(':prod_imagem', $produto->prod_imagem, PDO::PARAM_STR);
        $envio->bindParam(':prod_valor', $produto->prod_valor, PDO::PARAM_STR);
        $envio->bindParam(':prod_pk_id', $prod_pk_id, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($prod_pk_id = "") {
        $query = "DELETE FROM myboutique.produto WHERE prod_pk_id=:prod_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":prod_pk_id", $prod_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

    public static function save(model\produto\ModelProduto $produto = null) {
        if (!is_object($produto)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.produto ";
        $query .= "(prod_nome, prod_quantidade, prod_imagem, prod_valor) ";
        $query .= "VALUES ";
        $query .= "(:prod_nome, :prod_quantidade, :prod_imagem, :prod_valor);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':prod_nome', $produto->prod_nome, PDO::PARAM_STR);
        $envio->bindParam(':prod_quantidade', $produto->prod_quantidade, PDO::PARAM_STR);
        $envio->bindParam(':prod_imagem', $produto->prod_imagem, PDO::PARAM_STR);
        $envio->bindParam(':prod_valor', $produto->prod_valor, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

}
