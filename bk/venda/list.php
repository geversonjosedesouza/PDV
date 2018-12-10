<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
    <div class="col-lg-9">
        <a id="novaVenda" href="<?php echo server_url('?page=ControllerVenda&option=novo'); ?>" class="btn btn-default">
            <span class="glyphicon glyphicon-plus-sign"></span>
            Nova Venda
        </a>
        <br><br>
        <?php
        if ($vendas == false) {
            echo '<h2>Não existe(m) venda(s) cadastrado(s)!</h2>';
        } else {

            echo '<table class="table table-hover table-striped">';
            echo '<tr>';
            echo '<th>Código</th>';
            echo '<th>Quantidade</th>';
            echo '<th>Total</th>';
            echo '<th>Data</th>';
            echo '<th>Cliente</th>';
            echo '<th>Opções</th>';
            echo '</tr>';

            foreach ($vendas as $cada_venda) {
                echo '<tr>';
                echo '<td>', $cada_venda->vend_pk_id, '</td>';
                echo '<td>', $cada_venda->vend_quantidade, '</td>';
                echo '<td>', $cada_venda->vend_subtotal, '</td>';
                echo '<td>', $cada_venda->vend_data, '</td>';
                echo '<td>', $cada_venda->clie_nome, '</td>';
                echo '<td>';
                echo '<a href="', server_url('?page=ControllerVenda&option=consulta&vend_pk_id=' . $cada_venda->vend_pk_id), '" class="btn btn-info">';
                echo '<span class="glyphicon glyphicon-search"></span>';
                echo '</a>';
                echo '<a href="', server_url('?page=ControllerVenda&option=edita&vend_pk_id=' . $cada_venda->vend_pk_id), '" class="btn btn-warning">';
                echo '<span class="glyphicon glyphicon-edit"></span>';
                echo '</a>';
                echo '<a data-toggle="modal" href="', server_url('?page=ControllerVenda&option=excluir&vend_pk_id=' . $cada_venda->vend_pk_id), '" class="btn btn-danger">';
                echo '<span class="glyphicon glyphicon-trash"></span>';
                echo '</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="modal fade" id="excluir_venda" data-toggle="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Você tem certeza?</div>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <a href="<?php echo server_url('?page=ControllerVenda&option=excluir'); ?>" class="btn btn-danger">Sim</a>
                    <button class="btn btn-danger" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>