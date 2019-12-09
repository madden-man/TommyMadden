<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/4/17
 * Time: 4:12 PM
 */


if ((isset($_POST['song_name']) && isset($_POST['artist_name'])) && ($_POST['song_name'] !== "" || $_POST['artist_name'] !== "")) {
    $song_name = $_POST['song_name'];
    $artist_name = $_POST['artist_name'];

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_current_slides");

    $song_name = mysqli_real_escape_string($mysqli, $_POST['song_name']);
    $artist_name = mysqli_real_escape_string($mysqli, $_POST['artist_name']);

    $url_artist_name = noPunctuation($artist_name);
    $url_song_name = noPunctuation($song_name);


    if (strpos($url_artist_name, 'the') === 0) {
        $url_artist_name = substr($url_artist_name, 3);
    }

    $urlToUse = 'https://www.azlyrics.com/lyrics/' . $url_artist_name . '/' . $url_song_name . '.html';


    $headers = @get_headers($urlToUse);

    $query = "INSERT INTO `tommraed_current_slides`.`slides_to_lookup` (`id`, `song_name`, `artist_name`, `ready`)"
        . " VALUES (NULL, '" . $song_name . "', '" . $artist_name . "', ";

    $ready = "";
    if (strpos($headers[0], '200') === false) {
        $ready = "0";
    } else {
        $ready = "1";
    }

    $query .= $ready . ");";

    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        $rowData = "song_name: " . $song_name . "\n";
        $rowData .= "artist_name: " . $artist_name . "\n";
        $rowData .= "ready: " . $ready . "\n";
        echo $rowData;
    } else {
        echo "Didn't work!";
    }

}

if (isset($_GET['song_name']) || isset($_GET['artist_name'])) {
    $song_name = $_GET['song_name'];
    $artist_name = $_GET['artist_name'];

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_current_slides");
    $url_artist_name = noPunctuation($artist_name);
    $url_song_name = noPunctuation($song_name);


    if (strpos($url_artist_name, 'the') === 0) {
        $url_artist_name = substr($url_artist_name, 3);
    }

    $urlToUse = 'https://www.azlyrics.com/lyrics/' . $url_artist_name . '/' . $url_song_name . '.html';


    $headers = @get_headers($urlToUse);

    $query = "INSERT INTO `tommraed_current_slides`.`slides_to_lookup` (`id`, `song_name`, `artist_name`, `ready`)"
        . " VALUES (NULL, '" . $song_name . "', '" . $artist_name . "', ";

    if (strpos($headers[0], '200') === false) {
        $query .=  "0" . ");";
    } else {
        $query .= "1" . ");";
    }


    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        echo "Successful!";
    } else {
        echo "Didn't work!";
    }
}

function noPunctuation($string) {
    $newString = "";
    $length = strlen($string);
    for ($i = 0; $i < $length; ++$i) {
        $ascii = ord(substr($string, $i));
        if ($ascii >=  48 && $ascii <= 57) {

            // Numbers
            $newString .= chr($ascii);

        } else if ($ascii >= 65 && $ascii <= 90) {

            // Uppercase letters
            $newString .= chr($ascii + 32);

        } else if (ord(substr($string, $i)) >= 97 && ord(substr($string, $i)) <= 122) {

            // Lowercase letters
            $newString .= chr($ascii);

        }
    }

    return $newString;
}