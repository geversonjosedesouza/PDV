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
        <label>Nome de Usuário:</label>
        <input type="email" name="usua_nome" placeholder="Digite o email" class="form-control" required>
        <br>
        <label>Senha do Usuário:</label>
        <input type="password" name="usua_senha" placeholder="Digite a senha" class="form-control" required>
        <br>
        <label>Status:</label>
        <select name="usua_status" class="form-control" required> 
            <option selected>INATIVO</option>
            <option>ATIVO</option>
        </select>
         <label>Tipo:</label>
        <select name="usua_tipo" class="form-control" required> 
            <option selected>CLIENTE</option>
            <option >FUNCIONÁRIO</option>
        </select>
        <br>
        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>