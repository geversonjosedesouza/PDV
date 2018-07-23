<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');

ini_set('display_errors', 1);

class DAOUsuario extends DAOConexao {

    public static function getElementName($user = "") {
        $query = "SELECT * FROM geverson.usuario";
        $query .= " WHERE user=:user LIMIT 1;";
        try {
            //abrir a conexao
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->bindParam(':user', $user, PDO::PARAM_STR);
        $busca->execute();
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function select() {
        $query = "SELECT * FROM geverson.usuario";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $busca = $conexao->prepare($query);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getElementId($codigo = "") {
        $query = "SELECT * FROM geverson.usuario WHERE codigo=:codigo;";

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

    public static function update(model\us\ModelUsuario $usuario = null, $codigo = "") {
        if (!is_object($usuario)) {
            throw new Exception("Dados incompletos");
        }

        $query = "UPDATE geverson.usuario SET ";
        $query .= "user=:user, ";
        $query .= "pass=:pass, ";
        $query .= "status=:status ";
        $query .= " WHERE codigo=:codigo;";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);

        $envio->bindParam(':user', $usuario->user, PDO::PARAM_STR);
        $envio->bindParam(':pass', $usuario->pass, PDO::PARAM_STR);
        $envio->bindParam(':status', $usuario->status, PDO::PARAM_STR);
        $envio->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $envio->execute();

        return true;
    }

    public static function delete($codigo = "") {
        $query = "DELETE FROM geverson.usuario WHERE codigo=:codigo;";
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

    public static function save(model\us\ModelUsuario $usuario = null) {
        if (!is_object($usuario)) {
            throw new Exception("Dados incompletos");
        }
        $query = "INSERT INTO geverson.usuario ";
        $query .= "(user, pass, status) ";
        $query .= "VALUES ";
        $query .= "(:user, :pass, :status);";
        try {
            $conexao = DAOConexao::getInstance();
        } catch (Exception $erro) {
            throw new Exception($erro->getMessage());
        }
        $envio = $conexao->prepare($query);
        $envio->bindParam(':user', $usuario->user, PDO::PARAM_STR);
        $envio->bindParam(':pass', $usuario->pass, PDO::PARAM_STR);
        $envio->bindParam(':status', $usuario->status, PDO::PARAM_STR);
        $envio->execute();
        return true;
    }

    public static function teste(model\us\ModelUsuario $use) {

        echo $use->codigo . '<br>';
        echo $use->user . '<br>';
        echo $use->pass . '<br>';
        echo $use->status . '<br>';
        echo '<script>';
        echo "alert( 'ops!');";
        echo '</script>';
    }

}
