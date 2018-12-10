<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9">
    <a href="<?php echo server_url('?page=ControllerContato&option=principal'); ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-copyright-mark"></span>
        Novo Contato
    </a>

    <br><br>

    <?php
    ini_set('display_errors', 1);
    if ($contatos == false) {
        echo '<h2>Não Existem Contatos salvos!</h2>';
    } else {

        echo '<table class="table table-hover table-striped">';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Nome</th>';
        echo '<th>E-mail</th>';
        echo '<th>Telefone</th>';
        echo '<th>Descrição</th>';
        echo '<th>Opções</th>';
        echo '</tr>';

        foreach ($contatos as $cada_contato) {
            echo '<tr>';
            echo '<td>', $cada_contato->cont_pk_id, '</td>';
            echo '<td>', $cada_contato->cont_nome, '</td>';
            echo '<td>', $cada_contato->cont_email, '</td>';
            echo '<td>', $cada_contato->cont_telefone, '</td>';
            echo '<td>', $cada_contato->cont_descricao, '</td>';
            echo '<td>';
            echo '<a href="', server_url('?page=ControllerContato&option=edita&cont_pk_id=' . $cada_contato->cont_pk_id), '" class="btn btn-warning">';
            echo '<span class="glyphicon glyphicon-edit"></span>';
            echo '</a>';

            echo ' <a href="', server_url('?page=ControllerContato&option=excluir&cont_pk_id=' . $cada_contato->cont_pk_id), '" class="btn btn-danger">';
            echo '<span class="glyphicon glyphicon-trash"></span>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</div>