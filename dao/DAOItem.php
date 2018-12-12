<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOItem extends DAOConexao {

    public static function select() {
        $query = "SELECT * FROM myboutique.item";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function selectItens($item_fk_pedido = "") {
        $query = "SELECT item_quantidade, item_valor, prod_nome, prod_imagem, pedi_pk_id FROM myboutique.item";
        $query .= " INNER JOIN myboutique.produto ON prod_pk_id = item_fk_produto";
        $query .= " INNER JOIN myboutique.pedido ON pedi_pk_id = item_fk_pedido";
        $query .= " WHERE item_fk_pedido=:item_fk_pedido;";

        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':item_fk_pedido', $item_fk_pedido, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($item_pk_id = "") {
        $query = "SELECT * FROM myboutique.item WHERE item_pk_id=:item_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":item_pk_id", $item_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\item\ModelItem $item = null, $item_pk_id = "") {
        if (!is_object($item)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE myboutique.item SET ";
        $query .= "item_nome=:item_nome, ";
        $query .= "item_cpf=:item_cpf, ";
        $query .= "item_endereco=:item_endereco, ";
        $query .= "item_telefone=:item_telefone ";
        $query .= " WHERE item_pk_id=:item_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':item_nome', $item->item_nome, PDO::PARAM_STR);
        $envio->bindParam(':item_cpf', $item->item_cpf, PDO::PARAM_STR);
        $envio->bindParam(':item_endereco', $item->item_endereco, PDO::PARAM_STR);
        $envio->bindParam(':item_telefone', $item->item_telefone, PDO::PARAM_STR);
        $envio->bindParam(':item_pk_id', $item_pk_id, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($item_pk_id = "") {
        $query = "DELETE FROM myboutique.item WHERE item_pk_id=:item_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":item_pk_id", $item_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

    public static function save(model\item\ModelItem $item = null) {
        if (!is_object($item)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.item ";
        $query .= "(item_nome, item_cpf, item_endereco, item_telefone) ";
        $query .= "VALUES ";
        $query .= "(:item_nome, :item_cpf, :item_endereco, :item_telefone);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':item_nome', $item->item_nome, PDO::PARAM_STR);
        $envio->bindParam(':item_cpf', $item->item_cpf, PDO::PARAM_STR);
        $envio->bindParam(':item_endereco', $item->item_endereco, PDO::PARAM_STR);
        $envio->bindParam(':item_telefone', $item->item_telefone, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

}
