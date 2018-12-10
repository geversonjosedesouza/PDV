<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);
include_once server_path("model/ModelUsuario.php");
include_once server_path("dao/DAOUsuario.php");

class ControllerUsuario {

    public static function principal() {
        include_once server_path('view/usuario/login.php');
    }

    public static function entrar($usua_nome = false, $usua_senha = false) {
        $usua_nome = ($usua_nome != false) ? $usua_nome : $_POST['usua_nome'];
        $usua_senha = ($usua_senha != false) ? $usua_senha : $_POST['usua_senha'];
        try {
            $us = DAOUsuario::getElementName($usua_nome);
            if ($us == false) {
                echo '<script type="text/javascript">alert("Se este é seu primeiro acesso, o usuário é root@root, e a senha é admin");</script>';   
            }
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
//        if (!usua_senhaword_verify($usua_senha, $us->usua_senha)) {
//            $caminho = server_url("?erro=Senha Incorreta");
//            redirect($caminho);
//            return false;
//        }
        $_SESSION['usuario'] = $us;

        $caminho = server_url("?sucesso=Bem vindo $us->usua_nome");
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

        if (!isset($_GET['usua_pk_id'])) {
            redirect(server_url('?erro=Usuário não informado'));
        }

        $usuario = DAOUsuario::getElementId($_GET['usua_pk_id']);

        if ($usuario == false) {
            redirect(server_url('?erro=Usuário não encontrado'));
        }

        include_once server_path('view/usuario/edit.php');
    }

    public static function editaProfile() {
        Validar::autorizar();
        $usua_nome = $_GET['usua_nome'];
        if (!isset($usua_nome)) {
            redirect(server_url('?erro=Usuário não informado'));
        }
        $usuario = DAOUsuario::getElementName($usua_nome);
        if ($usuario == false) {
            redirect(server_url('?erro=Usuário não encontrado'));
        }
        include_once server_path('view/usuario/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $usua_pk_id = strip_tags($_POST['usua_pk_id']);
        $usua_nome = strip_tags($_POST['usua_nome']);
        $usua_senha = strip_tags($_POST['usua_senha']);
        $usua_status = strip_tags($_POST['usua_status']);
        $usua_tipo = strip_tags($_POST['usua_tipo']);
        try {
            if (!isset($usua_pk_id)) {
                redirect(server_url('?erro=Usuário não informado'));
            }
            $usuario = new model\usuario\ModelUsuario($usua_nome, $usua_senha);
            $usuario->usua_nome = $usua_nome;
            $usuario->usua_senha = $usua_senha;
            $usuario->usua_status = $usua_status;
            $usuario->usua_tipo = $usua_tipo;

            DAOUsuario::update($usuario, $usua_pk_id);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerUsuario::lista();
    }

    public static function novo() {
        include_once server_path('view/usuario/new.php');
    }

    public static function salvar() {
        try {
            $usua_nome = strip_tags($_POST['usua_nome']);
            $usua_senha = strip_tags($_POST['usua_senha']);
            $usua_status = strip_tags($_POST['usua_status']);
            $usua_tipo = strip_tags($_POST['usua_tipo']);
            $usuario = new model\usuario\ModelUsuario($usua_nome, $usua_senha);
            $usuario->usua_nome = $usua_nome;
            $usuario->usua_senha = $usua_senha;
            $usuario->usua_status = $usua_status;
            $usuario->usua_tipo = $usua_tipo;
            DAOUsuario::save($usuario);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerUsuario::lista();
    }

    public static function excluir() {
        validar::autorizar();
        $usua_pk_id = strip_tags($_GET['usua_pk_id']);
        if (!isset($usua_pk_id)) {
            redirect(server_url('?erro=Usuário Não Informado'));
        }
        try {
            DAOUsuario::delete($usua_pk_id);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        ControllerUsuario::lista();
    }

}
