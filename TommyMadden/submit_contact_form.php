<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 9/6/2017
 * Time: 1:31 PM
 */


if (isset($_POST['user_name']) && $_POST['user_name'] != "") {
    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_users");
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone_num = $_POST['user_phone_num'];
    $message = $_POST['message'];
    $wasSuccessful = $mysqli->query("INSERT INTO contact_info (name, email, phone, website_description) VALUES ('" . $user_name . "', '" . $user_email . "', '" . $user_phone_num . "', '" . $message . "')");
    // the message
    $msg = "Name: " . $user_name . "\n";
    $msg .= "Email: " . $user_email . "\n";
    $msg .= "Phone Number: " . $user_phone_num . "\n";
    $msg .= "Message: " . $message . "\n";

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);

// send email
    mail("madde120@mail.chapman.edu", "Someone Wants a Website!", $msg);

}

?>