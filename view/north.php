<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav class="navbar navbar-inverse">
    <div class="col-lg-10">
        <a href="<?php echo server_url('?page=ControllerPrincipal&option=principal'); ?>" class="navbar-brand"><span class="glyphicon glyphicon-home">Início</span></a>
        <a href="<?php echo server_url('?page=ControllerProjeto&option=principal'); ?>" class="navbar-brand"> <span class="glyphicon glyphicon-bookmark">Projetos</span></a>  
        <a href="<?php echo server_url('?page=ControllerSobre&option=principal'); ?>" class="navbar-brand"> <span class="glyphicon glyphicon-exclamation-sign">Sobre</span></a>  
        <a href="<?php echo server_url('?page=ControllerFaculdade&option=principal'); ?>" class="navbar-brand"> <span class="glyphicon glyphicon-book">Faculdade</span></a> 
        <a href="<?php echo server_url('?page=ControllerContato&option=principal'); ?>" class="navbar-brand"> <span class="glyphicon glyphicon-copyright-mark">Contato</span></a> 
    </div>
    <div class="col-lg-2"><?php access(); ?></div>
</nav>