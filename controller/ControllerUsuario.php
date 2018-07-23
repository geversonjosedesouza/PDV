<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path("model/ModelUsuario.php");
include_once server_path("dao/DAOUsuario.php");
ini_set('display_errors', 1);

class ControllerUsuario {

    public static function principal() {
        include_once server_path('view/usuario/login.php');
    }

    public static function entrar($user = false, $pass = false) {
        //receber os dados
        $user = ($user != false) ? $user : $_POST['user'];
        $pass = ($pass != false) ? $pass : $_POST['pass'];

        try {
            //buscar no banco
            $us = DAOUsuario::getElementName($user);
            // testando ControllerUsuario::teste1($user, $us->pass);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
            return false;
        }

        if (!$us) {
            $caminho = server_url("?erro=Usuário não encontrado");
            redirect($caminho);
            return false;
        }
        //USAR QUANDO A SENHA FOR ENCRIPTOGRAFADA
//        if (!password_verify($pass, $us->pass)) {
//            $caminho = server_url("?erro=Senha Incorreta");
//            redirect($caminho);
//            return false;
//        }
        //criar uma sessao com os dados do usuario
        $_SESSION['usuario'] = $us;

        $caminho = server_url("?sucesso=Bem vindo $us->user");
        redirect($caminho);
    }

    public static function sair() {
        session_destroy();
        $caminho = server_url("?sucesso=Você Saiu");
        redirect($caminho);
    }

    public static function lista() {
        validar::autorizar();
        try {
            $usuarios = DAOUsuario::select();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/usuario/list.php');
    }

    public static function edita() {
        Validar::autorizar();

        if (!isset($_GET['codigo'])) {
            redirect(server_url('?erro=Usuário não informado'));
        }

        //buscando livro para ser editado
        $usuario = DAOUsuario::getElementId($_GET['codigo']);

        if ($usuario == false) {
            redirect(server_url('?erro=Usuário não encontrado'));
        }

        include_once server_path('view/usuario/edit.php');
    }

    public static function editaProfile() {
        Validar::autorizar();
        $user = $_GET['user'];
        if (!isset($user)) {
            redirect(server_url('?erro=Usuário não informado'));
        }
        $usuario = DAOUsuario::getElementName($user);
        if ($usuario == false) {
            redirect(server_url('?erro=Usuário não encontrado'));
        }
        include_once server_path('view/usuario/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $codigo = strip_tags($_POST['codigo']);
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        $status = strip_tags($_POST['status']);
//        ControllerUsuario::teste1($status, '');
//        if ($status != 'on') {
//            $status = 'INATIVO';
//        } else {
//            $status = 'ATIVO';
//        }
        try {
            if (!isset($codigo)) {
                redirect(server_url('?erro=Usuário não informado'));
            }
            $usuario = new model\us\ModelUsuario($user, $pass);
            $usuario->status = $status;

            DAOUsuario::update($usuario, $codigo);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerUsuario::lista();
    }

    public static function novo() {
        include_once server_path('view/usuario/new.php');
    }

    public static function salvar() {
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $status = strip_tags($_POST['status']);
        try {
            $usuario = new model\us\ModelUsuario($username, $password);
            $usuario->status = $status;
            DAOUsuario::save($usuario);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerUsuario::lista();
    }

    public static function excluir() {
        validar::autorizar();
        if (!isset($_GET['codigo'])) {
            redirect(server_url('?erro=Usuário Não Informado'));
        }
        try {
            DAOUsuario::delete($_GET['codigo']);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        redirect(server_url('?sucesso=Usuário Excluido'));
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

    public static function teste1($use, $pas) {
        echo '<script>';
        echo "alert( 'ops!');";
        echo '</script>';
        echo $use . '<br>';
        echo $pas . '<br>';
    }

}
