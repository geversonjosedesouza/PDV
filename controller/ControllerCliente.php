<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);
include_once server_path("model/ModelCliente.php");
include_once server_path("dao/DAOCliente.php");

class ControllerCliente {


    public static function lista() {
        validar::autorizar();
        try {
            $clientes = DAOCliente::select();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/cliente/list.php');
    }

    public static function edita() {
        Validar::autorizar();

        if (!isset($_GET['clie_pk_id'])) {
            redirect(server_url('?erro=Cliente não informado'));
        }

        $cliente = DAOCliente::getElementId($_GET['clie_pk_id']);

        if ($cliente == false) {
            redirect(server_url('?erro=Cliente não encontrado'));
        }

        include_once server_path('view/cliente/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $clie_pk_id = strip_tags($_POST['clie_pk_id']);
        $clie_nome = strip_tags($_POST['clie_nome']);
        $clie_cpf = strip_tags($_POST['clie_cpf']);
        $clie_endereco = strip_tags($_POST['clie_endereco']);
        $clie_telefone = strip_tags($_POST['clie_telefone']);
        try {
            if (!isset($clie_pk_id)) {
                redirect(server_url('?erro=Cliente não informado'));
            }
            $cliente = new model\cliente\ModelCliente($clie_nome, $clie_cpf);
            $cliente->clie_endereco = $clie_endereco;
            $cliente->clie_telefone = $clie_telefone;

            DAOCliente::update($cliente, $clie_pk_id);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerCliente::lista();
    }

    public static function novo() {
        include_once server_path('view/cliente/new.php');
    }

    public static function salvar() {
        try {
            $clie_nome = strip_tags($_POST['clie_nome']);
            $clie_cpf = strip_tags($_POST['clie_cpf']);
            $clie_endereco = strip_tags($_POST['clie_endereco']);
            $clie_telefone = strip_tags($_POST['clie_telefone']);
            $cliente = new model\cliente\ModelCliente($clie_nome, $clie_cpf);
            $cliente->clie_endereco = $clie_endereco;
            $cliente->clie_telefone = $clie_telefone;
            DAOCliente::save($cliente);
           
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
         ControllerCliente::lista();
    }

    public static function excluir() {
        validar::autorizar();
        $clie_pk_id = strip_tags($_GET['clie_pk_id']);
        if (!isset($clie_pk_id)) {
            redirect(server_url('?erro=Cliente Não Informado'));
        }
        try {
            DAOCliente::delete($clie_pk_id);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        redirect(server_url('?sucesso=Cliente Excluido'));
        ControllerCliente::lista();
    }

}
