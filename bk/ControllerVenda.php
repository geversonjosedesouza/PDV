<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);
include_once server_path("model/ModelVenda.php");
include_once server_path("dao/DAOVenda.php");
include_once server_path("dao/DAOCliente.php");
include_once server_path("dao/DAOProduto.php");

class ControllerVenda {


    public static function lista() {
        validar::autorizar();
        try {
            $vendas = DAOVenda::selectVendas();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/venda/list.php');
    }

    public static function edita() {
        Validar::autorizar();

        if (!isset($_GET['vend_pk_id'])) {
            redirect(server_url('?erro=Venda não informado'));
        }

        $venda = DAOVenda::getElementId($_GET['vend_pk_id']);

        if ($venda == false) {
            redirect(server_url('?erro=Venda não encontrado'));
        }

        include_once server_path('view/venda/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $vend_pk_id = strip_tags($_POST['vend_pk_id']);
        $vend_nome = strip_tags($_POST['vend_nome']);
        $vend_cpf = strip_tags($_POST['vend_cpf']);
        $vend_endereco = strip_tags($_POST['vend_endereco']);
        $vend_telefone = strip_tags($_POST['vend_telefone']);
        try {
            if (!isset($vend_pk_id)) {
                redirect(server_url('?erro=Venda não informado'));
            }
            $venda = new model\venda\ModelVenda($vend_nome, $vend_cpf);
            $venda->vend_endereco = $vend_endereco;
            $venda->vend_telefone = $vend_telefone;

            DAOVenda::update($venda, $vend_pk_id);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerVenda::lista();
    }

    public static function novo() {
        $clientes = DAOCliente::select();
        $produtos = DAOProduto::select();
        include_once server_path('view/venda/new.php');
    }

    public static function salvar() {
        try {
            $vend_nome = strip_tags($_POST['vend_nome']);
            $vend_cpf = strip_tags($_POST['vend_cpf']);
            $vend_endereco = strip_tags($_POST['vend_endereco']);
            $vend_telefone = strip_tags($_POST['vend_telefone']);
            $venda = new model\venda\ModelVenda($vend_nome, $vend_cpf);
            $venda->vend_endereco = $vend_endereco;
            $venda->vend_telefone = $vend_telefone;
            DAOVenda::save($venda);
           
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
         ControllerVenda::lista();
    }

    public static function excluir() {
        validar::autorizar();
        $vend_pk_id = strip_tags($_GET['vend_pk_id']);
        if (!isset($vend_pk_id)) {
            redirect(server_url('?erro=Venda Não Informado'));
        }
        try {
            DAOVenda::delete($vend_pk_id);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        redirect(server_url('?sucesso=Venda Excluido'));
        ControllerVenda::lista();
    }

}
