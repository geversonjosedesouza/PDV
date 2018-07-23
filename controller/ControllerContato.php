<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once server_path("model/ModelContato.php");
include_once server_path("dao/DAOContato.php");

class ControllerContato {

    public static function principal() {
        include_once server_path('view/contato/new.php');
    }

    public static function obrigado() {
        include_once server_path('view/contato/success.php');
    }

    public static function salvar() {
        try {
            $nome = strip_tags($_POST['nome']);
            $email = strip_tags($_POST['email']);
            $telefone = strip_tags($_POST['telefone']);
            $descricao = strip_tags($_POST['descricao']);

            $contato = new model\co\ModelContato($nome, $email);
            $contato->telefone = $telefone;
            $contato->descricao = $descricao;
            DAOContato::salvar($contato);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        redirect(server_url('?page=ControllerContato&option=obrigado'));
    }

    public static function lista() {
        validar::autorizar();
        try {
            $contato = DAOContato::listar();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/contato/list.php');
    }

    public static function edita() {
        validar::autorizar();
        if (!isset($_GET['codigo'])) {
            redirect(server_url('?erro=Contato não informado'));
        }
        $contato = DAOContato::buscarPorId($_GET['codigo']);
        if ($contato == false) {
            redirect(server_url('?erro=Contato não encontrado'));
        }
        include_once server_path('view/contato/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $codigo = strip_tags($_POST['codigo']);
        $nome = strip_tags($_POST['nome']);
        $email = strip_tags($_POST['email']);
        $telefone = strip_tags($_POST['telefone']);
        $descricao = strip_tags($_POST['descricao']);
        if (!isset($codigo)) {
            redirect(base_url('?erro=Contato não informado'));
        }
        $contato = new model\co\ModelContato($nome, $email);
        $contato->codigo = $codigo;
        $contato->telefone = $telefone;
        $contato->descricao = $descricao;
        try {
            DAOContato::update($contato, $_POST['codigo']);
        } catch (Exception $erro) {
            redirect(base_url("?erro=" . $erro->getMessage()));
        }
        ControllerContato::lista();
    }

    public static function excluir() {
        validar::autorizar();
        if (!isset($_GET['codigo'])) {
            redirect(base_url('?erro=Contato Não Informado'));
        }
        try {
            DAOContato::delete($_GET['codigo']);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        //redirect(server_url('?sucesso=Contato Excluido'));
        ControllerContato::lista();
    }

}
