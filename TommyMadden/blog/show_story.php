<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 5/17/2017
 * Time: 9:56 PM
 */

include("navbar.php");

$story_name = $_GET['story_name'];


?>


<?php

function readFile($begin, $end, $story_name)
{
    $myfile = fopen("stories/" . $story_name . ".php", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    $count = $begin;
    while (!feof($myfile) && $count < $end) {
        $count++;
        echo fgets($myfile);
        /*
        if ($count >= $begin) {
            echo $line;
        }

        */
    }
    fclose($myfile);
}

?>

<head>
    <link href="http://tommymadden.com/blog/css/story.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="story_container">
<div class="story">
    <?php



    readFile(0, 10, $story_name);
    ?>
</div>
</div>
</body>
