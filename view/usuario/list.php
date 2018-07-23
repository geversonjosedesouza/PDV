<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9">
    <a href="<?php echo server_url('?page=ControllerUsuario&option=novo'); ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-user"></span>
        Novo Usuário
    </a>
    <br><br>
    <?php
    if ($usuarios == false) {
        echo '<h2>Não Existem Usuários!</h2>';
    } else {

        echo '<table class="table table-hover table-striped">';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Username</th>';
        echo '<th>Password</th>';
        echo '<th>Status</th>';
        echo '<th>Opções</th>';
        echo '</tr>';

        foreach ($usuarios as $cada_usuario) {
            echo '<tr>';
            echo '<td>', $cada_usuario->codigo, '</td>';
            echo '<td>', $cada_usuario->user, '</td>';
            echo '<td>', $cada_usuario->pass, '</td>';
            echo '<td>', $cada_usuario->status, '</td>';
            echo '<td>';
            echo '<a href="', server_url('?page=ControllerUsuario&option=edita&codigo=' . $cada_usuario->codigo), '" class="btn btn-warning">';
            echo '<span class="glyphicon glyphicon-edit"></span>';
            echo '</a>';

            echo ' <a data-toggle="modal" href="#excluir_usuario" class="btn btn-danger">';
            echo '<span class="glyphicon glyphicon-trash"></span>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</div>
<div class="modal fade" id="excluir_usuario" data-toggle="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Você tem certeza?</div>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="<?php echo server_url('?page=ControllerUsuario&option=excluir'); ?>" class="btn btn-danger">Sim</a>
                <button class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>