<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOUsuario extends DAOConexao {

    public static function getElementName($usua_nome = "") {
        $query = "SELECT * FROM myboutique.usuario";
        $query .= " WHERE usua_nome=:usua_nome LIMIT 1;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':usua_nome', $usua_nome, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function select() {
        $query = "SELECT * FROM myboutique.usuario";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($usua_pk_id = "") {
        $query = "SELECT * FROM myboutique.usuario WHERE usua_pk_id=:usua_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(":usua_pk_id", $usua_pk_id, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function update(model\usuario\ModelUsuario $usuario = null, $usua_pk_id = "") {
        if (!is_object($usuario)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE myboutique.usuario SET ";
        $query .= "usua_nome=:usua_nome, ";
        $query .= "usua_senha=:usua_senha, ";
        $query .= "usua_status=:usua_status, ";
        $query .= "usua_tipo=:usua_tipo ";
        $query .= " WHERE usua_pk_id=:usua_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':usua_nome', $usuario->usua_nome, PDO::PARAM_STR);
        $envio->bindParam(':usua_senha', $usuario->usua_senha, PDO::PARAM_STR);
        $envio->bindParam(':usua_status', $usuario->usua_status, PDO::PARAM_STR);
        $envio->bindParam(':usua_tipo', $usuario->usua_tipo, PDO::PARAM_STR);
        $envio->bindParam(':usua_pk_id', $usua_pk_id, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($usua_pk_id = "") {
        $query = "DELETE FROM myboutique.usuario WHERE usua_pk_id=:usua_pk_id;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $excluir = $conexao->prepare($query);
        $excluir->bindParam(":usua_pk_id", $usua_pk_id, PDO::PARAM_STR);
        $excluir->execute();

        return true;
    }

    public static function save(model\usuario\ModelUsuario $usuario = null) {
        if (!is_object($usuario)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO myboutique.usuario ";
        $query .= "(usua_nome, usua_senha, usua_status, usua_tipo) ";
        $query .= "VALUES ";
        $query .= "(:usua_nome, :usua_senha, :usua_status, :usua_tipo);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':usua_nome', $usuario->usua_nome, PDO::PARAM_STR);
        $envio->bindParam(':usua_senha', $usuario->usua_senha, PDO::PARAM_STR);
        $envio->bindParam(':usua_status', $usuario->usua_status, PDO::PARAM_STR);
        $envio->bindParam(':usua_tipo', $usuario->usua_tipo, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

}
