<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once server_path('dao/DAOConexao.php');
include_once server_path('model/ModelContato.php');
include_once server_path('dao/DAOContato.php');

ini_set('display_errors', 1);

class ControllerTeste {

    public static function lista() {
        try {
            $contato = DAOContato::listar();
        } catch (Exception $erro) {
            redirect(base_server("?erro=" . $erro->getMessage()));
        }
        include_once server_path('view/teste/list.php');
    }

    public static function novo() {
        include_once server_path('view/teste/testeUser.php');
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
            ControllerTeste::teste($contato);
            DAOContato::inserir($contato);
        } catch (Exception $erro) {
            redirect(base_server("?erro=" . $erro->getMessage()));
        }
        redirect(base_server("?sucesso=Contato Inserido"));
    }

    public static function edita() {
        if (!isset($_GET['codigo'])) {
            redirect(server_url('?erro=Contato não informado'));
        }

        //buscando livro para ser editado
        $contato = DAOContato::buscarPorId($_GET['codigo']);

        if ($contato == false) {
            redirect(server_url('?erro=Contato não encontrado'));
        }

        include_once server_path('view/teste/edit.php');
    }

    public static function atualizar() {
        $codigo = strip_tags($_POST['codigo']);
        $nome = strip_tags($_POST['nome']);
        $email = strip_tags($_POST['email']);
        $telefone = strip_tags($_POST['telefone']);
        $descricao = strip_tags($_POST['descricao']);
        if (!isset($codigo)) {
            redirect(server_url('?erro=Contato não informado'));
        }

        $contato = new model\co\ModelContato($nome, $email);
        $contato->codigo = $codigo;
        $contato->telefone = $telefone;
        $contato->descricao = $descricao;
        
        try {
            DAOContato::update($contato, $_POST['codigo']);
        } catch (Exception $erro) {
            redirect(server_url("?erro=" . $erro->getMessage()));
        }

        redirect(server_url("?sucesso=Contato Atualizado"));
    }

    public static function teste(\model\co\ModelContato $cont) {
        echo '<script>';
        echo "alert( 'ops!');";
        echo '</script>';
        echo $cont->codigo . '<br>';
        echo $cont->nome . '<br>';
        echo $cont->email . '<br>';
        echo $cont->telefone . '<br>';
        echo $cont->descricao . '<br>';
    }

    public static function teste1() {
        $nome = strip_tags($_POST['nome']);
        $email = strip_tags($_POST['email']);
        $telefone = strip_tags($_POST['telefone']);
        $descricao = strip_tags($_POST['descricao']);

        $contato = new model\co\ModelContato($nome, $email);
        $contato->telefone = $telefone;
        $contato->descricao = $descricao;
        DAOContato::inserir1($contato);
    }

    public static function edita1() {
        if (!isset($_GET['id'])) {
            redirect(server_url('?erro=Contato não informado'));
        }

        //buscando livro para ser editado
        $contato = DAOContato::buscarPorId($_GET['codigo']);

        if ($contato == false) {
            redirect(server_url('?erro=Contato não encontrado'));
        }

        include_once server_url('view/teste/edit.php');
    }

}
