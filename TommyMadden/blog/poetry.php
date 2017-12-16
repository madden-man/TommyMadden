<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 4/4/2017
 * Time: 9:13 PM
 */

session_set_cookie_params(3600);
session_start();

include("navbar.php");
?>
<head>
    <title>Poetry</title>
    <link href="css/poetry.css" type="text/css" rel="stylesheet" />
</head>

<div class="circle_container">
    <div class="circle_base" id="index" onclick="setWidth()" onresize="setWidth()">

        Someone once told me..


        Showing off poetry is a lot like being naked.


        You don't hide back the really intense feelings.


        You don't leave out the important parts.


        Because by nature, poetry is messy - it's raw, it's powerful, it's surprising.


        So here's some of my poetry. It might seem weird.

        Or ugly.

        Or confusing.


        But it's all honest!
    </div>

    <?php include("poetry_list.php"); ?>

    <script type="text/javascript">
        var setWidth = function() {
            var circle_div = document.getElemenyById("index");
            var circle_height = circle_div.height;
            circle_div.style.width = circle_height + "px";
        }
    </script>
</div>