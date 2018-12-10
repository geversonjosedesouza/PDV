<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul class="nav navbar-nav">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $us->usua_nome; ?><span class="glyphicon glyphicon-user"></span></a>
        <ul class="dropdown-menu">    
            <li><a href="<?php echo server_url("?page=ControllerPrincipal&option=panelControl"); ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-menu-left"></span>Painel de Controle</a></a></li>
            <li><a href="<?php echo server_url("?page=ControllerUsuario&option=editaProfile&usua_nome=" . $us->usua_nome); ?>" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-user"></span>Perfil</a></li>
            <li><a href="<?php echo server_url("?page=ControllerUsuario&option=sair"); ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-off"></span> Sair</a></a></li>            
        </ul>
    </li>
</ul>
