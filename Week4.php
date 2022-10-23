<?php

require("week4Functions.php");
date_default_timezone_set("America/New_York");
$date = date("m/d/Y");
$time = date("h:i:sa");
?>

<!doctype html>
<html>
    
    <head>

        <script src="./jquery/jquery-3.6.1.min.js"></script>
        <link rel="stylesheet" href="./foundation/css/foundation.min.css">
        
        <style>
            .cell {
                border: 1px solid black;
            }
            #sidebar {
                height: 600px;
                background-color: rgb(37, 185, 69);
                padding: 10px;
                float: left;
            }
            #body {
                height: 600px;
                background-color: grey;
                padding: 10px;
                float: left;;          
            }
            #img{
                width: 100%;
                height: 200px;
               
            }

            .alleft{
                padding: 10px;
                float: left
             }

            .alrightt{
                padding: 10px;
                float: right
            }
            .nav {
                margin: 10px;
            }
            #header {
                background: black;
            }
            #entire {
                margin: 50px;
            }

            #footer{
                background-color: rgb(11, 4, 105);
                padding: 10px;
                width: 100%;
                height: 10%;
                text-align: right;                
                display: inline;
            }
        </style>
        <script>
        $( document ).ready(function() {
            $("#alert").on("click", callAlert);
            $("#change").on("click", callChange);
             
            function callAlert() {
                alert("Hello World!");
            }
            function callChange() {
                $("#body").html("New Text after change");
            }
         
        });
         
        </script>
    </head>
    <body>
        <div id=entire>
            <div class="grid-x">
                <div id=header class="cell small-12 medium-12 large-12 text-right">
                    <button id=alert class="button nav">Hello</button>
                    <button id=change class="button nav">Change Info</button>             
                </div>
                <div class="cell small-12 medium-12 large-12">
                    <img id=img src="./webprogimg.jpg" alt="Blue Wallpaper">   
                </div>
            </div>
            <div class="grid-x">
                <div id=sidebar class="cell small-12 medium-4 large-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </div>
                <div id=body class="cell small-12 medium-8 large-8">
                Body of the page  <br>  
                <?php PrintTimeDate($date, $time) ; ?> <br>
                    
                </div>
                <div id="footer" class="cell small-12 medium-8 large-8">
                    <p class="alleft" style="color:white;">Â© 2022 Vraj Shah, Bachelor's, All Rights Reserved </p>  
                    <p class="alrightt" style="color:white;">Design by Vraj Shah </p>
                </div>
            </div>
        </div>
    </body>
</html>