<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-6 jumbotron">
    <legend>Entre em contato</legend>
    <form action="?page=ControllerContato&option=salvar" method="post">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite seu nome" class="form-control" required>
        <br>

        <label>Email: </label>
        <input type="email" name="email" placeholder="Digite seu email" class="form-control" required>
        <br>

        <label>Telefone: </label>
        <input type="number" name="telefone"  placeholder="Digite seu telefone" class="form-control" required>
        <br>
        <label>Descrição:</label>
        <textarea rows="3" cols="5" name="descricao" placeholder="Digite uma descrição" class="form-control" required></textarea><br>
        <button class="btn btn-primary btn-lg btn-block">
            <span class="glyphicon glyphicon-ok-sign">Enviar</span>
        </button>
    </form>
</div>
<div class="col-lg-6">
    <ul>
        <li><span class="glyphicon "></span>Facebook: https://www.facebook.com/geversonjosedesouza</li>
        <li><span class="glyphicon "></span>Instagran: https://www.instagran.com/geversonjosedesouza </li>
        <li><span class="glyphicon "></span>E-mail: geversonjosedesouza@gmail.com</li>
    </ul>
</div> 
<br>
