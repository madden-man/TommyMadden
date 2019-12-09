<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/4/17
 * Time: 4:12 PM
 */

function getEmail($num) {
    $npa = substr($num, 0, 3);
    $nxx = substr($num, 3, 3);
    $thoublock = substr($num, 6, 4);

    $url = 'http://www.fonefinder.net/findome.php?npa=' . $npa . '&nxx=' . $nxx . '&thoublock=' . $thoublock . '&usaquerytype=Search+by+Number&cityname=;';
    $headers = @get_headers($url);

    if(strpos($headers[0],'200')===false) {
        header('Location: ' . $url);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    $pieces = explode("\n", $data);

    $to = $num;
    for ($i = 0; $i < sizeof($pieces); ++$i) {
        if (strpos(strtolower($pieces[$i]), 'verizon') !== -1) {
            $to .= "@vtext.com";
            break;
        } else if (strpos(strtolower($pieces[$i]), 'new cingular wireless')) {
            $to .= "@txt.att.com";
        } else if (strpos(strtolower($pieces[$i]), 'sprint')) {
            $to .= "@messaging.sprintpcs.com";
        } else if (strpos(strtolower($pieces[$i]), 'metropcs')) {
            $to .= "@mymetropcs.com";
        } else if (strpos(strtolower($pieces[$i]), 'boost')) {
            $to .= "@myboostmobile.com";
        } else if (strpos(strtolower($pieces[$i]), 't-mobile')) {
            $to .= "@tmomail.net";
        } else if (strpos(strtolower($pieces[$i]), 'us cellular')) {
            $to .= "@uscc.textmsg.com";
        }
    }

    return $to;
}

function filterToNum($input) {
    $output = "";
    for ($i = 0; $i < strlen($input); ++$i) {
        if ($input[$i] === '%') {
            $i += 2;
        } else if (ord($input[$i]) >= 48 && ord($input[$i]) <= 57) {
            $output .= $input[$i];
        }
    }
    return $output;
}

if ((isset($_POST['name']) && isset($_POST['num'])) && ($_POST['name'] !== "" || $_POST['num'] !== "")) {
    $name = $_POST['name'];
    $num = $_POST['num'];

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