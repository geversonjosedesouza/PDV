<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerUsuario&option=atualizar'); ?>" method="POST">
        <legend>Atualizar Perfil</legend>
        <input type="hidden" value="<?php echo $usuario->usua_pk_id; ?>" name="usua_pk_id" class="form-control" placeholder="Código">
        <label>Username:</label>
        <input type="text" value="<?php echo $usuario->usua_nome; ?>" name="usua_nome" placeholder="Digite o email" class="form-control" required>
        <br>

        <label>Password:</label>
        <input type="password" value="<?php echo $usuario->usua_senha; ?>" name="usua_senha" placeholder="Digite a senha" class="form-control" required>
        <br>

        <label>Status:</label>
        <select name="usua_status" class="form-control">
            <option selected><?php echo $usuario->usua_status; ?></option>
            <?php
            if ($usuario->status == 'INATIVO') {
                echo '<option>ATIVO</option>';
            } else {

                echo '<option>INATIVO</option>';
            }
            ?>

        </select>
        <label>Tipo:</label>
        <select name="usua_tipo" class="form-control">
            <option selected><?php echo $usuario->usua_tipo; ?></option>
            <?php
            if ($usuario->status == 'FUNCIONARIO') {
                echo '<option>FUNCIONARIO</option>';
            } else {

                echo '<option>CLIENTE</option>';
            }
            ?>

        </select>
        <br>
        <br>

        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>