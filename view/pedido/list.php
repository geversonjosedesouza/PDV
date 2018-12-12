<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9">
    <a id="novaPedido" href="<?php echo server_url('?page=ControllerPedido&option=novo'); ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-plus-sign"></span>
        Novo Pedido
    </a>
    <br><br>
    <?php
    if ($pedidos == false) {
        echo '<h2>Não existe(m) pedido(s) cadastrado(s)!</h2>';
    } else {

        echo '<table class="table table-hover table-striped">';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Cliente</th>';
        echo '<th>Quantidade</th>';
        echo '<th>Total</th>';
        echo '<th>Data</th>';
        echo '<th>Status</th>';
        echo '<th>Opções</th>';
        echo '</tr>';

        foreach ($pedidos as $cada_pedido) {
            echo '<tr>';
            echo '<td>', $cada_pedido->pedi_pk_id, '</td>';
            echo '<td>', $cada_pedido->clie_nome, '</td>';
            echo '<td>', $cada_pedido->pedi_quantidade, '</td>';
            echo '<td>', $cada_pedido->pedi_total, '</td>';
            echo '<td>', $cada_pedido->pedi_data, '</td>';
            echo '<td>', $cada_pedido->pedi_status, '</td>';
            echo '<td>';
            echo '<a href="', server_url('?page=ControllerPedido&option=visualizar&pedi_pk_id='. $cada_pedido->pedi_pk_id), '" class="btn btn-info">';
            echo '<span class="glyphicon glyphicon-search"></span>';
            echo '</a>';
            if ($cada_pedido->pedi_status == "CONFIRMADO") {
                
            } else {
                echo '<a href="', server_url('?page=ControllerPedido&option=edita&pedi_pk_id=' . $cada_pedido->pedi_pk_id), '" class="btn btn-warning">';
                echo '<span class="glyphicon glyphicon-edit"></span>';
                echo '</a>';
            }
            echo '<a data-toggle="modal" href="', server_url('?page=ControllerPedido&option=excluir&pedi_pk_id=' . $cada_pedido->pedi_pk_id), '" class="btn btn-danger">';
            echo '<span class="glyphicon glyphicon-trash"></span>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</div>
<div class="modal fade" id="excluir_pedido" data-toggle="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Você tem certeza?</div>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="<?php echo server_url('?page=ControllerPedido&option=excluir'); ?>" class="btn btn-danger">Sim</a>
                <button class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>
