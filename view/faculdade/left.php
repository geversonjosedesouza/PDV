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
                <a href="<?php echo server_url('?page=ControllerFaculdade&option=principal'); ?>">
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo server_url('?page=ControllerFaculdade&option=tec_net_2'); ?>">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    Tecnologia Para Internet 2
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-off"></span>
                    Outros
                </a>
            </li>
        </ul>
    </div> 
</div> 