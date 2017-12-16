<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 11/12/17
 * Time: 7:03 PM
 */

if ((isset($_POST['category']) && isset($_POST['food']) && isset($_POST['user'])) && ($_POST['category'] !== "" || $_POST['food'] !== "" || $_POST['user'] !== "")) {

    $category = $_POST['category'];
    $food = $_POST['food'];
    $user = $_POST['user'];

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_family_data");

    $query = "INSERT INTO `tommraed_family_data`.`food_plan` (`id`, `category`, `food`, `user`)"
        . " VALUES (NULL, '" . $category . "', '" . $food . "', " . $user . ")";

    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        $rowData = "category: " . $category . "\n";
        $rowData .= "food: " . $food . "\n";
        $rowData .= "user: " . $user . "\n";
        echo $rowData;
    } else {
        echo "Didn't work!";
    }

}

?>