<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerUsuario&option=salvar'); ?>" method="post">
        <legend>Novo Usuário</legend>
        <label>Username:</label>
        <input type="email" name="nome" placeholder="Digite o email" class="form-control" required>
        <br>
        <label>Password:</label>
        <input type="password" name="senha" placeholder="Digite a senha" class="form-control" required>
        <br>
        <div class="checkbox">
            <label class="form-control" ><input type="checkbox" name="status" required>Ativar</label>
        </div>
        <br>
        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>