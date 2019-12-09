<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 5/11/2017
 * Time: 12:14 AM
 */

$poem_name = $_GET['poem_name'];

include("navbar.php");
?>
<head>
    <link href="https://tommymadden.com/blog/css/index.css" type="text/css" rel="stylesheet" />
    <?php

    if ($poem_name == "although_some_friends") {
        echo "<title>Although Some Friends</title>";
    } else if ($poem_name == "conjunctivitis") {
        echo "<title>Conjunctivitis</title>";
    } else if ($poem_name == "callings") {
        echo "<title>Callings</title>";
    } else if ($poem_name == "deep_deep_deep") {
        echo "<title>Deep, deep, deep</title>";
    } else if ($poem_name == "i_met_a") {
        echo "<title>i met a girl</title>";
    } else if ($poem_name == "I_stood_alone") {
        echo "<title>I Stood Alone</title>";
    } else if ($poem_name == "In_your_eyes") {
        echo "<title>Flesh and Bone</title>";
    } else if ($poem_name == "My Greatest Fear") {
        echo "<title>My Greatest Fear</title>";
    } else if ($poem_name == "There_was_a") {
        echo "<title>Alright = All right</title>";
    } else if ($poem_name == "We_laughed_a") {
        echo "<title>Journeys</title>";
    } else if ($poem_name == "When_violence_refuses") {
        echo "<title>Powerless Hell</title>";
    } else if ($poem_name == "Your_hair_is") {
        echo "<title>Your hair is crimson</title>";
    } else if ($poem_name == "no_matter_what") {
        echo "<title>No Matter What</title>";
    } else if ($poem_name == "daydreams") {
        echo "<title>Daydreams</title>";
    } else if ($poem_name == "Natures_Hue") {
        echo "<title>Nature's Hue</title>";
    }
    ?>
</head>
<div class="content_container">
    <div class="content">
        <?php include("poems/" . $poem_name . ".php"); ?>
    </div>
</div>

<?php include("poetry_list.php"); ?>