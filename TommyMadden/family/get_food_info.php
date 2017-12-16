<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 11/12/17
 * Time: 5:49 PM
 */

$mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_family_data");

if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    $results = $mysqli->query("SELECT * FROM food_plan");
    while ($row = $results->fetch_assoc()) {
        if ($row["category"] === "appetizer") {
            printf("Appetizer: <tr class='row' id='row%s'><td>%s</td> <td>%s</td><td>%s</td><td><button id='%s' class='btn_remove'></button></td></tr>\n", $row["id"], $row["food"], $row["user"], $row["id"]);
        } else if ($row["category"] === "dish") {
            printf("Dish: <tr class='row' id='row%s'><td>%s</td> <td>%s</td><td>%s</td><td><button id='%s' class='btn_remove'></button></td></tr>\n", $row["id"], $row["food"], $row["user"], $row["id"]);
        } else if ($row["category"] === "side") {
            printf("Side: <tr class='row' id='row%s'><td>%s</td> <td>%s</td><td>%s</td><td><button id='%s' class='btn_remove'></button></td></tr>\n", $row["id"], $row["food"], $row["user"], $row["id"]);
        } else if ($row["category"] === "dessert") {
            printf("Dessert: <tr class='row' id='row%s'><td>%s</td> <td>%s</td><td>%s</td><td><button id='%s' class='btn_remove'></button></td></tr>\n", $row["id"], $row["food"], $row["user"], $row["id"]);
        }
    }

    /* free result set */
    $results->free();

}

?>