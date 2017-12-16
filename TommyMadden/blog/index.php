<?php

session_set_cookie_params(3600);
session_start();

include("navbar.php");

$user = $_SERVER['REMOTE_ADDR'];

//mail("madde120@mail.chapman.edu","Blog View",":)\n\nUser: " . $user);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Tommy Madden's Blog</title>
    <link rel="stylesheet" href="https://tommymadden.com/blog/css/index.css">
</head>

<body>
    <div class="content_container">
        <div class="hideable" id="left_brain_explanation">

        </div>
        <div class="content">
            <h1 class="welcome_header">Hello, World!</h1>

            <p id="description">My name is Tommy Madden, and I am a work in progress.</p>

            <!-- add jQuery form here! -->
        </div>
    </div>
</body>
</html>