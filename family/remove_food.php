<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 11/12/17
 * Time: 6:38 PM
 */

if (isset($_POST['id'])) {

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_food_data");

    $id = $_POST['id'];
    $query = "DELETE FROM `tommraed_food_data`.`food_plan`"
        . " WHERE id=" . $id . ";";

    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        echo "Successful!";
    } else {
        echo "Didn't work!";
    }
}

?>