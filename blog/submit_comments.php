<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 6/9/2017
 * Time: 2:11 PM
 */

if ($_POST) {
    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_comments");
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $postname = $_POST['postname'];
    $wasSuccessful = $mysqli->query("INSERT INTO comments (post_name, name, comment) VALUES ('" . $postname . "', '" . $name . "', '" . $comment . "')");
}

?>