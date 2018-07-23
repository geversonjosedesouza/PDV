<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12">
    <form action="<?php echo server_url('?page=ControllerTeste&option=atualizar'); ?>" method="POST">
        <legend>Editar Contato</legend>
        <input type="hidden" name="codigo" value="<?php echo $contato->codigo; ?>" class="form-control" placeholder="Código">
        <br>
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $contato->nome; ?>" class="form-control" placeholder="Informe o nome" required>
        <br>
        <label>E-mail</label>
        <input type="text" name="email" value="<?php echo $contato->email; ?>" class="form-control" placeholder="Informe o E-mail" required>
        <br>
        <label>Telefone</label>
        <input type="tel" name="telefone" value="<?php echo $contato->telefone; ?>" class="form-control" placeholder="Digite o Telefone" required>
        <br>
        <label>Descrição</label>
        <textarea type="text" name="descricao" class="form-control" placeholder="Assunto" required><?php echo $contato->descricao; ?></textarea>
        <br>
        <button class="btn btn-primary btn-block btn-lg">CONFIRMAR</button>
    </form><br>
</div>