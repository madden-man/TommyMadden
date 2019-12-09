<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 4/4/2017
 * Time: 9:13 PM
 */

session_set_cookie_params(3600);
session_start();

header('Location: show_sermon.php?sermon_name=jazz');

include("navbar.php");
?>
    <head>
        <title>Sermons</title>
        <link href="css/index.css" type="text/css" rel="stylesheet" />
    </head>

    <div class="content_container">
        <!--div class="content" style="width: 48%;"><h1>Here's some poetry!</h1>

            Put a welcome video here!

        </div-->
    </div>
<?php include("sermon_list.php"); ?>