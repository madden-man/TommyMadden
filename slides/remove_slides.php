<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/6/17
 * Time: 5:04 PM
 */

if (isset($_POST['id'])) {

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_current_slides");

    $id = $_POST['id'];
    $query = "DELETE FROM `tommraed_current_slides`.`slides_to_lookup`"
        . " WHERE id=" . $id . ";";

    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        echo "Successful!";
    } else {
        echo "Didn't work!";
    }
}


?>