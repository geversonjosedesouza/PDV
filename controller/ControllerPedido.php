<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);
include_once server_path("model/ModelPedido.php");
include_once server_path("dao/DAOPedido.php");
include_once server_path("dao/DAOCliente.php");
include_once server_path("dao/DAOProduto.php");
include_once server_path("dao/DAOItem.php");

class ControllerPedido {

    public static function lista() {
        validar::autorizar();
        try {
            $pedidos = DAOPedido::selectPedidos();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/pedido/list.php');
    }

    public static function edita() {
        Validar::autorizar();

        if (!isset($_GET['pedi_pk_id'])) {
            redirect(server_url('?erro=Pedido não informado'));
        }

        $pedido = DAOPedido::getElementId($_GET['pedi_pk_id']);

        if ($pedido == false) {
            redirect(server_url('?erro=Pedido não encontrado'));
        }

        include_once server_path('view/pedido/edit.php');
    }

    public static function visualizar() {
        Validar::autorizar();
        $numPedido = strip_tags($_GET['pedi_pk_id']);
        if (!isset($numPedido)) {
            redirect(server_url('?erro=Pedido não informado'));
        }
        $pedido = DAOPedido::getPedido($numPedido);
        $pedido_aberto = new model\pedido\ModelPedido();
        $pedido_aberto->pedi_pk_id = $pedido->pedi_pk_id;
        $pedido_aberto->pedi_fk_cliente = $pedido->pedi_fk_cliente;
        $pedido_aberto->pedi_quantidade = $pedido->pedi_quantidade;
        $pedido_aberto->pedi_total = $pedido->pedi_total;
        $pedido_aberto->pedi_data = $pedido->pedi_data;
        $pedido_aberto->pedi_status = "ABERTO";
        DAOPedido::update($pedido_aberto, $pedido_aberto->pedi_pk_id);
        $itens = DAOItem::selectItens($numPedido);
        $produtos = DAOProduto::select();
        if ($pedido == false) {
            redirect(server_url('?erro=Pedido não encontrado'));
        }
        include_once server_path('view/pedido/source.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $pedi_pk_id = strip_tags($_POST['pedi_pk_id']);
        $pedi_fk_cliente = strip_tags($_POST['pedi_fk_cliente']);
        $pedi_quantidade = strip_tags($_POST['pedi_quantidade']);
        $pedi_total = strip_tags($_POST['pedi_total']);
        $pedi_data = strip_tags($_POST['pedi_data']);
        $pedi_status = strip_tags($_POST['pedi_data']);
        try {
            if (!isset($pedi_pk_id)) {
                redirect(server_url('?erro=Pedido não informado'));
            }
            $pedido = new model\pedido\ModelPedido();
            $pedido->pedi_pk_id = $pedi_pk_id;
            $pedido->pedi_fk_cliente = $pedi_fk_cliente;
            $pedido->pedi_quantidade = $pedi_quantidade;
            $pedido->pedi_total = $pedi_total;
            $pedido->pedi_data = $pedi_data;
            $pedido->pedi_status = "FECHADO";

            DAOPedido::update($pedido, $pedi_pk_id);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerPedido::lista();
    }

    public static function novo() {
        $clientes = DAOCliente::select();
        $produtos = DAOProduto::select();
        include_once server_path('view/pedido/new.php');
    }

    public static function salvar() {
        validar::autorizar();
        $pedi_fk_cliente = strip_tags($_POST['pedi_fk_cliente']);
        $pedi_quantidade = strip_tags($_POST['pedi_quantidade']);
        $pedi_total = strip_tags($_POST['pedi_total']);
        $pedi_data = strip_tags($_POST['pedi_data']);
        $pedi_status = "FECHADO";
        try {
            $pedido = new model\pedido\ModelPedido();
            $pedido->pedi_fk_cliente = $pedi_fk_cliente;
            $pedido->pedi_quantidade = $pedi_quantidade;
            $pedido->pedi_total = $pedi_total;
            $pedido->pedi_data = $pedi_data;
            $pedido->pedi_status = $pedi_status;
            DAOPedido::save($pedido);
            $id = DAOPedido::retornaUltiID();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerPedido::lista();
    }

    public static function excluir() {
        validar::autorizar();
        $pedi_pk_id = strip_tags($_GET['pedi_pk_id']);
        if (!isset($pedi_pk_id)) {
            redirect(server_url('?erro=Pedido Não Informado'));
        }
        try {
            DAOPedido::delete($pedi_pk_id);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        ControllerPedido::lista();
    }

}
