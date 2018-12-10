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
            $cont_nome = strip_tags($_POST['cont_nome']);
            $cont_email = strip_tags($_POST['cont_email']);
            $cont_telefone = strip_tags($_POST['cont_telefone']);
            $cont_descricao = strip_tags($_POST['cont_descricao']);

            $contato = new model\contato\ModelContato($cont_nome, $cont_email);
            $contato->cont_telefone = $cont_telefone;
            $contato->cont_descricao = $cont_descricao;
            DAOContato::salvar($contato);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        redirect(server_url('?page=ControllerContato&option=obrigado'));
    }

    public static function lista() {
        validar::autorizar();
        try {
            $contatos = DAOContato::listar();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/contato/list.php');
    }

    public static function edita() {
        validar::autorizar();
        if (!isset($_GET['cont_pk_id'])) {
            redirect(server_url('?erro=Contato não informado'));
        }
        $contato = DAOContato::buscarPorId($_GET['cont_pk_id']);
        if ($contato == false) {
            redirect(server_url('?erro=Contato não encontrado'));
        }
        include_once server_path('view/contato/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $cont_pk_id = strip_tags($_POST['cont_pk_id']);
        $cont_nome = strip_tags($_POST['cont_nome']);
        $cont_email = strip_tags($_POST['cont_email']);
        $cont_telefone = strip_tags($_POST['cont_telefone']);
        $cont_descricao = strip_tags($_POST['cont_descricao']);
        if (!isset($cont_pk_id)) {
            redirect(server_url('?erro=Contato não informado'));
        }
        $contato = new model\contato\ModelContato($cont_nome, $cont_email);
        $contato->cont_codigo = $cont_pk_id;
        $contato->cont_telefone = $cont_telefone;
        $contato->cont_descricao = $cont_descricao;
        try {
            DAOContato::update($contato, $_POST['cont_pk_id']);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerContato::lista();
    }

    public static function excluir() {
        validar::autorizar();
        if (!isset($_GET['cont_pk_id'])) {
            redirect(base_url('?erro=Contato Não Informado'));
        }
        try {
            DAOContato::delete($_GET['cont_pk_id']);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        ControllerContato::lista();
    }

}
