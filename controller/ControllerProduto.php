<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);
include_once server_path("model/ModelProduto.php");
include_once server_path("dao/DAOProduto.php");

class ControllerProduto {

    public static function lista() {
        validar::autorizar();
        try {
            $produtos = DAOProduto::select();
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/produto/list.php');
    }

    public static function edita() {
        Validar::autorizar();

        if (!isset($_GET['prod_pk_id'])) {
            redirect(server_url('?erro=Produto não informado'));
        }

        $produto = DAOProduto::getElementId($_GET['prod_pk_id']);

        if ($produto == false) {
            redirect(server_url('?erro=Produto não encontrado'));
        }

        include_once server_path('view/produto/edit.php');
    }

    public static function atualizar() {
        validar::autorizar();
        $prod_pk_id = strip_tags($_POST['prod_pk_id']);
        $prod_nome = strip_tags($_POST['prod_nome']);
        $prod_quantidade = strip_tags($_POST['prod_quantidade']);
        $prod_imagem = strip_tags($_POST['prod_imagem']);
        $prod_valor = strip_tags($_POST['prod_valor']);
        try {
            if (!isset($prod_pk_id)) {
                redirect(server_url('?erro=Produto não informado'));
            }
            $produto = new model\produto\ModelProduto($prod_nome, $prod_quantidade);
            $produto->prod_imagem = $prod_imagem;
            $produto->prod_valor = $prod_valor;

            DAOProduto::update($produto, $prod_pk_id);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerProduto::lista();
    }

    public static function novo() {
        include_once server_path('view/produto/new.php');
    }

    public static function salvar_bk_upload() {
        try {
            $prod_nome = strip_tags($_POST['prod_nome']);
            $prod_quantidade = strip_tags($_POST['prod_quantidade']);
            $prod_imagem = $_FILES['prod_imagem'];
            if (!empty($prod_imagem["name"])) {
                // Verifica se o arquivo é uma imagem
                if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $prod_imagem["type"])) {
                    $error[1] = "Isso não é uma imagem.";
                }
                // Se não houver nenhum erro
                if (count($error) == 0) {
                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $prod_imagem["name"], $ext);
                    // Gera um nome único para a imagem
                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                    // Caminho de onde ficará a imagem
                    $caminho_imagem = server_path("upload/" . $nome_imagem);

                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($prod_imagem["tmp_name"], $caminho_imagem);
                }
            }
            $prod_valor = strip_tags($_POST['prod_valor']);
            $produto = new model\produto\ModelProduto($prod_nome, $prod_quantidade);
            $produto->prod_imagem = $prod_imagem;
            $produto->prod_valor = $prod_valor;
            DAOProduto::save($produto);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerProduto::lista();
    }

    public static function salvar() {
        try {
            $prod_nome = strip_tags($_POST['prod_nome']);
            $prod_quantidade = strip_tags($_POST['prod_quantidade']);
            $prod_imagem = strip_tags($_POST['prod_imagem']);
            $prod_valor = strip_tags($_POST['prod_valor']);
            $produto = new model\produto\ModelProduto($prod_nome, $prod_quantidade);
            $produto->prod_imagem = $prod_imagem;
            $produto->prod_valor = $prod_valor;
            DAOProduto::save($produto);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }
        ControllerProduto::lista();
    }

    public static function excluir() {
        validar::autorizar();
        $prod_pk_id = strip_tags($_GET['prod_pk_id']);
        if (!isset($prod_pk_id)) {
            redirect(server_url('?erro=Produto Não Informado'));
        }
        try {
            DAOProduto::delete($prod_pk_id);
        } catch (Exception $erro) {
            redirect(server_url('?erro=' . $erro->getMessage()));
        }
        ControllerProduto::lista();
    }

}
