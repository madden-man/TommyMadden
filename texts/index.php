<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 12/31/17
 * Time: 7:38 PM
 */

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

if (isset($_GET['num']) && isset($_GET['msg']) && strlen($_GET['num']) >= 10) {
    $msg = $_GET['msg'];
    $num = filterToNum($_GET['num']);
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
            break;
        } else if (strpos(strtolower($pieces[$i]), 'sprint')) {
            $to .= "@messaging.sprintpcs.com";
            break;
        } else if (strpos(strtolower($pieces[$i]), 'metropcs')) {
            $to .= "@mymetropcs.com";
            break;
        } else if (strpos(strtolower($pieces[$i]), 'boost')) {
            $to .= "@myboostmobile.com";
            break;
        } else if (strpos(strtolower($pieces[$i]), 't-mobile')) {
            $to .= "@tmomail.net";
            break;
        } else if (strpos(strtolower($pieces[$i]), 'us cellular')) {
            $to .= "@uscc.textmsg.com";
            break;
        }
    }
    mail($to, "", $msg, "From: Tommy Madden <me@tommymadden.com>\r\n");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Text From Website!</title>
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
</head>
<body>
<div id="form_container_container">
    <h1>Send a Text!</h1>
    <form method="get" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form">Phone Number: <br /><input type="text" placeholder="e. g. (800) 867-5309" name="num" class="form_input"/></div><br />
            <div class="form">Message: <br /><textarea id="msg_box" type="text" placeholder="Enter a message here!" name="msg"></textarea></div>

            <section class="press">
                <button type="submit">Submit!</button>

            </section>
        </div>
    </form>
</div>

</body>
</html>