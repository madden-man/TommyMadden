<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/6/17
 * Time: 5:29 PM
 */

$mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_current_slides");

if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    $results = $mysqli->query("SELECT * FROM slides_to_lookup");
    while ($row = $results->fetch_assoc()) {
        if ($row["ready"] === "0") {

            printf("Ready: <tr class='row' id='row%s'><td>%s</td> <td>%s</td><td><button id='%s' class='btn_remove'></button><a class='btn_search' href='slides_request.php?user_name=&song_name=%s&artist_name=%s'></a></td></tr>\n", $row["id"], $row["artist_name"], $row["song_name"], $row["id"], $row['song_name'], str_replace('&', '', $row['artist_name']));
        } else {
            printf("Not Ready: <tr class='row' id='row%s'><td>%s</td> <td>%s</td><td><button id='%s' class='btn_remove'></button><a class='btn_search' href='slides_request.php?user_name=&song_name=%s&artist_name=%s'></a></td></tr>\n", $row["id"], $row["artist_name"], $row["song_name"], $row["id"], $row['song_name'], str_replace('&', '', $row['artist_name']));
        }
    }

    /* free result set */
    $results->free();
}

?>