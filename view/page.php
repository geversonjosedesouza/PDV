<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>PDV</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="template/bootstrap-3.3.7/dist/css/bootstrap.css">
        <link rel="stylesheet" href="template/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="template/bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <script src="template/jquery-3.3.1.min.js"></script>
        <script src="template/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <!--<script src="../template/jquery.mask.min.js"></script>-->
    </head>
    <body class="container">
        <header class="row">
            <?php include_once server_path("view/north.php"); ?>
        </header>
        <section class="row">
            <?php pagina_conteudo(); ?>
        </section>
        <footer class="row">
            <?php include_once server_path("view/south.php"); ?>
        </footer>
    </body>
</html>
