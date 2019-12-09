<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 5/11/2017
 * Time: 12:14 AM
 */

$sermon_name = $_GET['sermon_name'];

include("navbar.php");
?>
    <head>
        <link href="https://tommymadden.com/blog/css/index.css" type="text/css" rel="stylesheet" />
        <link href="https://tommymadden.com/blog/css/sermon.css" type="text/css" rel="stylesheet" />
        <?php

        if ($sermon_name == "jazz") {
            echo "<title>God Lives In: Jazz!</title>";
        } else if ($sermon_name == "rap") {
            echo "<title>God Lives In: Rap!</title>";
        }
        ?>
    </head>
<div class="content_container">
<?php if ($sermon_name == "jazz") { ?>
    <div class="content" style="white-space: normal">
        <h2>God Lives In: Jazz</h2>
        Basically, I explain here how I see God in the realm of
        jazz. Through the confident, cool personality of jazz,
        God speaks of how stable His love can be, and how we can
        allow that overwhelming peace to permeate our lives.
    </div><br><br>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/sv2_eBdW4jA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php } else if ($sermon_name == "rap") { ?>

    <div class="content"style="white-space: normal">
        <h2>God Lives In: Rap</h2>
        In this sermon, I explain how although many (especially
        in the church) see rap as a bad genre, it really shows
        a lot about what authority should look like. Rappers are
        honest, confident, and unfiltered about what they think.
        In the same way, God is not afraid to tell us exactly what
        He thinks about us and how we live our lives.
    </div><br><br>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/TwrD_L3IdD0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php } ?>
</div>
<?php include("sermon_list.php"); ?>