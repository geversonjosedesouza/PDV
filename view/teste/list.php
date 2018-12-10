<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9">
    <a href="<?php echo server_url('?page=ControllerTeste&option=novo'); ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-book"></span>
        Novo Livro
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

        foreach ($contato as $cada_contato) {
            echo '<tr>';
            echo '<td>', $cada_contato->codigo, '</td>';
            echo '<td>', $cada_contato->nome, '</td>';
            echo '<td>', $cada_contato->email, '</td>';
            echo '<td>', $cada_contato->telefone, '</td>';
            echo '<td>', $cada_contato->descricao, '</td>';
            echo '<td>';
            echo '<a href="', server_url('?page=ControllerTeste&option=edita&codigo=' . $cada_contato->codigo), '" class="btn btn-warning">';
            echo '<span class="glyphicon glyphicon-edit"></span>';
            echo '</a>';

            echo ' <a href="', server_url('?page=ControllerTeste&option=excluir&codigo=' . $cada_contato->codigo), '" class="btn btn-danger">';
            echo '<span class="glyphicon glyphicon-trash"></span>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</div>