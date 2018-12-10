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
        <span class="glyphicon glyphicon-plus-sign"></span>
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
        echo '<th>Nome</th>';
        echo '<th>Senha</th>';
        echo '<th>Status</th>';
        echo '<th>Tipo</th>';
        echo '<th>Opções</th>';
        echo '</tr>';

        foreach ($usuarios as $cada_usuario) {
            echo '<tr>';
            echo '<td>', $cada_usuario->usua_pk_id, '</td>';
            echo '<td>', $cada_usuario->usua_nome, '</td>';
            echo '<td>', $cada_usuario->usua_senha, '</td>';
            echo '<td>', $cada_usuario->usua_status, '</td>';
            echo '<td>', $cada_usuario->usua_tipo, '</td>';
            echo '<td>';
            echo '<a href="', server_url('?page=ControllerUsuario&option=edita&usua_pk_id=' . $cada_usuario->usua_pk_id), '" class="btn btn-warning">';
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

    echo '</div>';
    echo '<div class = "modal fade" id = "excluir_usuario" data-toggle = "modal">';
    echo '<div class = "modal-dialog">';
    echo '<div class = "modal-content">';
    echo '<div class = "modal-header">';
    echo '<div class = "modal-title">Você tem certeza?</div>';
    echo '</div>';
    echo '<div class = "modal-body">';

    echo '</div>';
    echo '<div class = "modal-footer">';
    echo '<a href = "', server_url('?page=ControllerUsuario&option=excluir&usua_pk_id=' . $cada_usuario->usua_pk_id), '" class = "btn btn-danger">Sim</a>';
    echo '<button class = "btn btn-danger" data-dismiss = "modal">Não</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    ?>