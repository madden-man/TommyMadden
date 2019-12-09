<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 4/5/18
 * Time: 2:45 PM
 */

if ((isset($_REQUEST['text']))) {
    $text = $_REQUEST['text'];

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_interterm");

    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $num = mysqli_real_escape_string($mysqli, $_POST['num']);

    $num_email = getEmail(filterToNum($num));

    $query = "INSERT INTO `tommraed_interterm`.`subscribers` (`id`, `name`, `phone_email`)"
        . " VALUES (NULL, '" . $name . "', '" . $num_email . "');";

    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        $rowData = "name: " . $name . "\n";
        $rowData .= "num: " . $num . "\n";
        echo $rowData;

        mail($num_email, "", "Hello! You have been added, and will receive updates on fun events with Tommy Madden! Feel free to text back 'STOP' at any time to stop receiving these messages! But I promise, I won't spam (too bad!). :)", "From: Tommy Madden <me@tommymadden.com>\r\n");
        mail("4083550639@vtext.com", "", $name . " has been added!", "From: Tommy Madden <me@tommymadden.com>\r\n");
    } else {
        echo "Didn't work!";
    }

}