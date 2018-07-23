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
        <input type="hidden" value="<?php echo $usuario->codigo; ?>" name="codigo" class="form-control" placeholder="Código">
        <label>Username:</label>
        <input type="text" value="<?php echo $usuario->user; ?>" name="user" placeholder="Digite o email" class="form-control" required>
        <br>

        <label>Password:</label>
        <input type="password" value="<?php echo $usuario->pass; ?>" name="pass" placeholder="Digite a senha" class="form-control" required>
        <br>

        <label>Status:</label>
        <select name="status" class="form-control">
            <option selected><?php echo $usuario->status; ?></option>
            <?php
            if ($usuario->status == 'INATIVO') {
                echo '<option>ATIVO</option>';
            } else {

                echo '<option>INATIVO</option>';
            }
            ?>

        </select>
        <br>
        <br>

        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>