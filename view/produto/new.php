<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron">
    <form action="<?php echo server_url('?page=ControllerProduto&option=salvar'); ?>" method="post">
        <legend>Novo Produto</legend>
        <label>Nome:</label>
        <input type="text" name="prod_nome" placeholder="Digite o nome" class="form-control" required>
        <br>
        <label>Quantidade:</label>
        <input type="text" name="prod_quantidade" placeholder="Digite a quantidade" class="form-control" required>
        <br>
        <label>Imagem:</label>
        <input type="file" name="prod_imagem" placeholder="Selecione a imagem" class="form-control">
        <br>
        <label>Valor:</label>
        <input type="text" name="prod_valor" placeholder="Digite o valor" class="form-control" required>
        <br>
        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>
</div>