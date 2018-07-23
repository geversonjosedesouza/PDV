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
        $query = "SELECT * FROM geverson.contato";

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

    public static function salvar(model\co\ModelContato $contato = null) {
        if (!is_object($contato)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO geverson.contato ";
        $query .= "(nome, email, telefone, descricao) ";
        $query .= "VALUES ";
        $query .= "(:nome, :email, :telefone, :descricao);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':nome', $contato->nome, PDO::PARAM_STR);
        $envio->bindParam(':email', $contato->email, PDO::PARAM_STR);
        $envio->bindParam(':telefone', $contato->telefone, PDO::PARAM_STR);
        $envio->bindParam(':descricao', $contato->descricao, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

    public static function buscarPorId($codigo = "") {
        $query = "SELECT * FROM geverson.contato WHERE codigo=:codigo;";

        try {
            //abrir a conexao
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }

        //preparando busca
        $busca = $conexao->prepare($query);

        //substituindo valores
        $busca->bindParam(":codigo", $codigo, PDO::PARAM_STR);

        //executando envio
        $busca->execute();

        //retornando objeto livro
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\co\ModelContato $contato = null, $codigo = "") {
        if (!is_object($contato)) {
            throw new Exception("Dados incompletos");
        }
        $query = "UPDATE geverson.contato SET ";
        $query .= "nome=:nome, ";
        $query .= "email=:email, ";
        $query .= "telefone=:telefone, ";
        $query .= "descricao=:descricao ";
        $query .= " WHERE codigo=:codigo;";

        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }

        $envio = $conexao->prepare($query);
        $envio->bindParam(':nome', $contato->nome, PDO::PARAM_STR);
        $envio->bindParam(':email', $contato->email, PDO::PARAM_STR);
        $envio->bindParam(':telefone', $contato->telefone, PDO::PARAM_STR);
        $envio->bindParam(':descricao', $contato->descricao, PDO::PARAM_STR);
        $envio->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $envio->execute();

        //executando consulta
        $envio->execute();

        return true;
    }

    public static function delete($codigo = "") {
        $query = "DELETE FROM geverson.contato WHERE codigo=:codigo;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

}
