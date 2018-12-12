<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);
include_once server_path("model/ModelItem.php");
include_once server_path("dao/DAOItem.php");
include_once server_path("controller/ControllerPedido.php");

class ControllerItem {

    public static function lista() {
        validar::autorizar();
        try {
            $itens = DAOItem::selectItems();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/item/list.php');
    }

    public static function edita() {
        Validar::autorizar();

        if (!isset($_GET['item_pk_id'])) {
            redirect(server_url('?erro=Item não informado'));
        }

        $item = DAOItem::getElementId($_GET['item_pk_id']);

        if ($item == false) {
            redirect(server_url('?erro=Item não encontrado'));
        }

        include_once server_path('view/item/edit.php');
    }

    public static function visualizar() {
        Validar::autorizar();
        $numItem = strip_tags($_GET['item_pk_id']);
        if (!isset($numItem)) {
            redirect(server_url('?erro=Item não informado'));
        }
        $item = DAOItem::getItem($numItem);
        $itens = DAOItem::selectItens($numItem);
        $produtos = DAOProduto::select();
        if ($item == false) {
            redirect(server_url('?erro=Item não encontrado'));
        }
        include_once server_path('view/item/source.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $item_pk_id = strip_tags($_POST['item_pk_id']);
        $item_nome = strip_tags($_POST['item_nome']);
        $item_cpf = strip_tags($_POST['item_cpf']);
        $item_endereco = strip_tags($_POST['item_endereco']);
        $item_telefone = strip_tags($_POST['item_telefone']);
        try {
            if (!isset($item_pk_id)) {
                redirect(server_url('?erro=Item não informado'));
            }
            $item = new model\item\ModelItem($item_nome, $item_cpf);
            $item->item_endereco = $item_endereco;
            $item->item_telefone = $item_telefone;

            DAOItem::update($item, $item_pk_id);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerItem::lista();
    }

    public static function novo() {
        $clientes = DAOCliente::select();
        $produtos = DAOProduto::select();
        include_once server_path('view/item/new.php');
    }

    public static function salvar() {
        validar::autorizar();
        $item_fk_cliente = strip_tags($_POST['item_fk_cliente']);
        $item_quantidade = strip_tags($_POST['item_quantidade']);
        $item_total = strip_tags($_POST['item_total']);
        $item_data = strip_tags($_POST['item_data']);
        $item_status = "FECHADO";
        try {
            $item = new model\item\ModelItem();
            $item->item_fk_cliente = $item_fk_cliente;
            $item->item_quantidade = $item_quantidade;
            $item->item_total = $item_total;
            $item->item_data = $item_data;
            $item->item_status = $item_status;
            DAOItem::save($item);
            $id = DAOItem::retornaUltiID();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerItem::lista();
    }

    public static function excluir() {
        validar::autorizar();
        $item_pk_id = strip_tags($_GET['item_pk_id']);
        if (!isset($item_pk_id)) {
            redirect(server_url('?erro=Item Não Informado'));
        }
        try {
            DAOItem::delete($item_pk_id);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
    }

}
