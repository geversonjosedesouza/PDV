<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<div class="col-lg-4"></div>
<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                <span class="glyphicon glyphicon-lock"></span>
                <strong>Área de Login</strong>
            </div>
        </div><!--heading -->
        <div class="panel-body">
            <form action="<?php echo server_url('?page=ControllerUsuario&option=entrar'); ?>" method="POST">
                <input type="email" placeholder="Email" class="form-control input-lg" name="usua_nome" required><br>
                <input type="password" placeholder="Senha" class="form-control input-lg" name="usua_senha" required><br>
                <button class="btn btn-lg btn-block btn-primary">
                    <span class="glyphicon glyphicon-ok-sign"></span>Entrar</button>
            </form>
            <br>
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>
