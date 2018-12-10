<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerContato&option=atualizar'); ?>" method="POST">
        <legend>Editar Contato</legend>
        <input type="hidden" name="cont_pk_id" value="<?php echo $contato->cont_pk_id; ?>" class="form-control" placeholder="Código">
        <br>
        <label>Nome</label>
        <input type="text" name="cont_nome" value="<?php echo $contato->cont_nome; ?>" class="form-control" placeholder="Informe o nome" required>
        <br>
        <label>E-mail</label>
        <input type="text" name="cont_email" value="<?php echo $contato->cont_email; ?>" class="form-control" placeholder="Informe o E-mail" required>
        <br>
        <label>Telefone</label>
        <input type="tel" name="cont_telefone" value="<?php echo $contato->cont_telefone; ?>" class="form-control" placeholder="Digite o Telefone" required>
        <br>
        <label>Descrição</label>
        <textarea type="text" name="cont_descricao" class="form-control" placeholder="Assunto" required><?php echo $contato->cont_descricao; ?></textarea>
        <br>
        <button class="btn btn-primary btn-block btn-lg">CONFIRMAR</button>
    </form><br>
</div>