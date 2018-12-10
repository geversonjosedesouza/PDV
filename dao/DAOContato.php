<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOContato extends DAOConexao {

    public static function listar() {
        $query = "SELECT * FROM myboutique.contato";

        try {
            //abrir a conexao
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }

        $busca = $conexao->prepare($query);

        $busca->execute();

        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function salvar(model\contato\ModelContato $contato = null) {
        if (!is_object($contato)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.contato ";
        $query .= "(cont_nome, cont_email, cont_telefone, cont_descricao) ";
        $query .= "VALUES ";
        $query .= "(:cont_nome, :cont_email, :cont_telefone, :cont_descricao);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':cont_nome', $contato->cont_nome, PDO::PARAM_STR);
        $envio->bindParam(':cont_email', $contato->cont_email, PDO::PARAM_STR);
        $envio->bindParam(':cont_telefone', $contato->cont_telefone, PDO::PARAM_STR);
        $envio->bindParam(':cont_descricao', $contato->cont_descricao, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

    public static function buscarPorId($cont_pk_id = "") {
        $query = "SELECT * FROM myboutique.contato WHERE cont_pk_id=:cont_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":cont_pk_id", $cont_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\contato\ModelContato $contato = null, $cont_pk_id = "") {
        if (!is_object($contato)) {
            throw new Exception("Dados incompletos");
        }
        $query = "UPDATE myboutique.contato SET ";
        $query .= "cont_nome=:cont_nome, ";
        $query .= "cont_email=:cont_email, ";
        $query .= "cont_telefone=:cont_telefone, ";
        $query .= "cont_descricao=:cont_descricao ";
        $query .= " WHERE cont_pk_id=:cont_pk_id;";

        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }

        $envio = $conexao->prepare($query);
        $envio->bindParam(':cont_nome', $contato->cont_nome, PDO::PARAM_STR);
        $envio->bindParam(':cont_email', $contato->cont_email, PDO::PARAM_STR);
        $envio->bindParam(':cont_telefone', $contato->cont_telefone, PDO::PARAM_STR);
        $envio->bindParam(':cont_descricao', $contato->cont_descricao, PDO::PARAM_STR);
        $envio->bindParam(':cont_pk_id', $cont_pk_id, PDO::PARAM_STR);
        $envio->execute();
        $envio->execute();

        return true;
    }

    public static function delete($cont_pk_id = "") {
        $query = "DELETE FROM myboutique.contato WHERE cont_pk_id=:cont_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":cont_pk_id", $cont_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

}
