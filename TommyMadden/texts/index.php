<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 12/31/17
 * Time: 7:38 PM
 */

if (isset($_GET['num']) && isset($_GET['msg']) && strlen($_GET['num']) >= 10) {
    $msg = $_GET['msg'];
    $num = $_GET['num'];

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

    mail($to, "", $msg, "From: Tommy Madden <notify@tommymadden.com>\r\n");
}

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form action="" method="get">
    <label>
        Number: <input type="text" name="num"/>
    </label>
    <label>
        <textarea style="width: 400px; height: 600px;" name="msg">Send a message here!</textarea>
    </label>
    <input type="submit" />
</form>
</body>
</html>
