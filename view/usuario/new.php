<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerUsuario&option=salvar'); ?>" method="post">
        <legend>Novo Usuário</legend>
        <label>Username:</label>
        <input type="email" name="username" placeholder="Digite o email" class="form-control" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Digite a senha" class="form-control" required>
        <br>
        <label>Status:</label>
        <select name="status" class="form-control" required> 
            <option selected>INATIVO</option>
            <option>ATIVO</option>
        </select>
        <br>
        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>