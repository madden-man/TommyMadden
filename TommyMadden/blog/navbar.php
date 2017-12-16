<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 4/4/2017
 * Time: 9:17 PM
 */
?>
<head>
    <link type="text/css" href="https://tommymadden.com/blog/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="https://tommymadden.com/blog/css/universals.css" rel="stylesheet" />
    <style type="text/css">
        #bottom_bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
    <script type="text/javascript">
        function setSpotifyLocation() {
            var bottom_bar = document.getElementById("bottom_bar");
            bottom_bar.style.top = (window.innerHeight - 80) + "px";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width = 500" />

    <meta name="Keywords" content="website, christian, love, faith, people, man, program, service, easy, convenient, helpful, programming, development" />
    <meta name="Description" content="Tommy Madden is a Christian Web developer who develops websites for people through an elaborate and precise design process, giving each customer exactly what he/she needs. This service is performed in the hopes that Tommy would become a more experienced programmer and ultimately that he would benefit the world with his services." />
    <?php include("../analyticstracking.php"); ?>

    <link rel="shortcut icon" href="https://tommymadden.com/favicon.ico" type="image/x-icon">
</head>

<body>
<div id="nav_container">
    <a href="https://tommymadden.com/blog/blog.php"><div class="nav_title" id="nav_blog">Left Brain</div></a>
    <a href="https://tommymadden.com/blog/index.php"><div class="nav_title" id="nav_home">Home</div></a>
    <a href="https://tommymadden.com/blog/poetry.php"><div class="nav_title" id="nav_poetry">Right Brain</div></a>
</div>

</body>