<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/6/17
 * Time: 5:29 PM
 */

$mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_real_time_code");

if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    $results = $mysqli->query("SELECT code FROM my_page");
    while ($row = $results->fetch_assoc()) {
        print($row["code"]);
    }

    /* free result set */
    $results->free();
}

?>