<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9">
    <a href="<?php echo server_url('?page=ControllerCliente&option=novo'); ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-plus-sign"></span>
        Novo Cliente
    </a>
    <br><br>
    <?php
    if ($clientes == false) {
        echo '<h2>Não existe(m) cliente(s) cadastrado(s)!</h2>';
    } else {

        echo '<table class="table table-hover table-striped">';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Nome</th>';
        echo '<th>Senha</th>';
        echo '<th>Endereço</th>';
        echo '<th>Telefone</th>';
        echo '<th>Opções</th>';
        echo '</tr>';

        foreach ($clientes as $cada_cliente) {
            echo '<tr>';
            echo '<td>', $cada_cliente->clie_pk_id, '</td>';
            echo '<td>', $cada_cliente->clie_nome, '</td>';
            echo '<td>', $cada_cliente->clie_cpf, '</td>';
            echo '<td>', $cada_cliente->clie_endereco, '</td>';
            echo '<td>', $cada_cliente->clie_telefone, '</td>';
            echo '<td>';
            echo '<a href="', server_url('?page=ControllerCliente&option=edita&clie_pk_id=' . $cada_cliente->clie_pk_id), '" class="btn btn-warning">';
            echo '<span class="glyphicon glyphicon-edit"></span>';
            echo '</a>';

            echo '<a data-toggle="modal" href="', server_url('?page=ControllerCliente&option=excluir&clie_pk_id=' . $cada_cliente->clie_pk_id), '" class="btn btn-danger">';
            echo '<span class="glyphicon glyphicon-trash"></span>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</div>
<div class="modal fade" id="excluir_cliente" data-toggle="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Você tem certeza?</div>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="<?php echo server_url('?page=ControllerCliente&option=excluir'); ?>" class="btn btn-danger">Sim</a>
                <button class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>