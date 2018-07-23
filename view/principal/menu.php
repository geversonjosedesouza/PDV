<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <span class="glyphicon glyphicon-list"></span>
            <strong> Menu </strong>
        </div>
    </div><!--heading -->
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class="active">
                <a href="<?php echo server_url('?page=ControllerPrincipal&option=panelControl'); ?>">
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo server_url('?page=ControllerContato&option=lista'); ?>">
                    <span class="glyphicon glyphicon-copyright-mark"></span>
                    Contatos
                </a>
            </li>
            <li>
                <a href="<?php echo server_url('?page=ControllerUsuario&option=lista'); ?>">
                    <span class="glyphicon glyphicon-user"></span>
                    Usuários
                </a>
            </li>
            <li>
                <a href="<?php echo server_url('?page=ControllerTeste&option=lista'); ?>">
                    <span class="glyphicon glyphicon-adjust"></span>
                    Área de Teste
                </a>
            </li>
        </ul>
    </div> 
</div> 