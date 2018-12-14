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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
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

        <script >
            $(document).ready(function () {
                var $seuCampoCpf = $("#cpf");
                $seuCampoCpf.mask('000.000.000-00', {reverse: true});
                var $seuCampoTelefone = $("#telefone");
                $seuCampoTelefone.mask('(00) 0 0000-0000', {reverse: true});
                var $seuCampoQuantidade = $("#quantidade");
                $seuCampoQuantidade.mask('###0.00', {reverse: true});
                var $seuCampoMoeda = $("#moeda");
                $seuCampoMoeda.mask('###0.00', {reverse: true});

            });
        </script>
    </body>
</html>
