<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerCliente&option=atualizar'); ?>" method="POST">
        <legend>Alterar Dados</legend>
        <input type="hidden" value="<?php echo $cliente->clie_pk_id; ?>" name="clie_pk_id" placeholder="Código" class="form-control">
        <label>Nome:</label>
        <input type="text" value="<?php echo $cliente->clie_nome; ?>" name="clie_nome" placeholder="Nome" class="form-control" required>
        <br>
        <label>CPF:</label>
        <input type="number" value="<?php echo $cliente->clie_cpf; ?>" name="clie_cpf" placeholder="CPF" class="form-control" required>
        <br>
        <label>Endereço:</label>
        <input type="text" value="<?php echo $cliente->clie_endereco; ?>" name="clie_endereco" placeholder="Endereço" class="form-control" required>
        <br>
        <label>Telefone:</label>
        <input type="number" value="<?php echo $cliente->clie_telefone; ?>" name="clie_telefone" placeholder="Telefone" class="form-control" required>
        <br>
        <br>
        <br>

        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>