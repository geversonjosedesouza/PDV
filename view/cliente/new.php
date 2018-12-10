<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerCliente&option=salvar'); ?>" method="post">
        <legend>Novo Usuário</legend>
        <label>Nome:</label>
        <input type="text" name="clie_nome" placeholder="Digite o nome" class="form-control" required>
        <br>
        <label>CPF:</label>
        <input type="text" name="clie_cpf" placeholder="Digite o CPF" class="form-control" required>
        <br>
        <label>Endereço:</label>
        <input type="text" name="clie_endereco" placeholder="Digite o endereço" class="form-control" required>
        <br>
        <label>Telefone:</label>
        <input type="tel" name="clie_telefone" placeholder="Digite o telefone" class="form-control" required>
        <br>
        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>