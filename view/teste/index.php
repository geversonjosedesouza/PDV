<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Carousel Example</h2>  
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../../img/slideJava.png" alt="Los Angeles" style="width:100%;">
                        <h4>Segundo Rótulo do Slide</h4>
                        <p>“A melhor maneira de prever o futuro é inventá-lo.”
                            Alan Kay, cientista da computação, em 1971.</p>
                    </div>

                    <div class="item">
                        <img src="../../img/slideLinux.png" alt="Chicago" style="width:100%;">
                        <h4>Segundo Rótulo do Slide</h4>
                        <p>“A melhor maneira de prever o futuro é inventá-lo.”
                            Alan Kay, cientista da computação, em 1971.</p>
                    </div>

                    <div class="item">
                        <img src="../../img/slidePostgres.png" alt="New york" style="width:100%;">
                        <h4>Segundo Rótulo do Slide</h4>
                        <p>“A melhor maneira de prever o futuro é inventá-lo.”
                            Alan Kay, cientista da computação, em 1971.</p>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </body>
</html>