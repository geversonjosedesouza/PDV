<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form enctype="multipart/form-data" action="<?php echo server_url('?page=ControllerProduto&option=atualizar'); ?>" method="POST">
        <legend>Alterar Dados</legend>
        <input type="hidden" value="<?php echo $produto->prod_pk_id; ?>" name="prod_pk_id" placeholder="Código" class="form-control">
        <label>Nome:</label>
        <input type="text" value="<?php echo $produto->prod_nome; ?>" name="prod_nome" placeholder="Nome" class="form-control" required>
        <br>
        <label>Quantidade:</label>
        <input type="text" value="<?php echo $produto->prod_quantidade; ?>" name="prod_quantidade" placeholder="CPF" class="form-control" required>
        <br>
        <label>Imagem:</label>
        <input type="file" value="<?php echo $produto->prod_imagem; ?>" name="prod_imagem" placeholder="Imagem" class="form-control" required>
        <br>
        <label>Valor R$:</label>
        <input type="text" value="<?php echo $produto->prod_valor; ?>" name="prod_valor" placeholder="Valor" class="form-control" required>
        <img src="../../upload/produto/computador.jpg" width="30" height="30" alt="computador"/>

        <br>
        <br>
        <br>

        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>