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
    <link href="css/index.css" type="text/css" rel="stylesheet" />
</head>

<div class="content_container">
    <div class="content" style="width: 48%;"><h1>Here's some poetry!</h1>
    Hope you like it!

    </div>
</div>
<?php include("poetry_list.php"); ?>