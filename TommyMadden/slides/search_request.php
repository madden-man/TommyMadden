<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/3/17
 * Time: 1:03 AM
 */

$q = $_GET['q'];
$user_name = $_GET['user_name'];

$url = 'http://search.azlyrics.com/search.php?q=' . $q;
$headers = @get_headers($url);

if(strpos($headers[0],'200')===false) {
    mail("madde120@mail.chapman.edu", "Worship Slides Problem", $user_name . ", URL: " . $url);
    if (strpos($url, '+') !== false) {
        header('Location: search_request.php?q=' . substr($q, 0, strrpos($url, '+')));
    } else {
        header('Location: search_request.php');
    }
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);


$pieces = explode("\n", $data);

for ($i = 0; $i < sizeof($pieces); ++$i) {

    if (strpos($pieces[$i], 'azlyrics.com/lyrics') !== false) {
        $song_start_pos = strpos($pieces[$i], '<b>') + 3;
        $song_end_pos = strpos($pieces[$i], '</b>');
        $artist_start_pos = strpos($pieces[$i], 'by <b>') + 6;
        $artist_end_pos = strpos(substr($pieces[$i], $artist_start_pos), '</b>');
        $song_name = substr($pieces[$i], $song_start_pos, $song_end_pos - $song_start_pos);
        $artist_name = substr($pieces[$i], $artist_start_pos, $artist_end_pos);

        $escaped_song_name = $song_name;
        $escaped_artist_name = $artist_name;
        if (strpos($song_name, '&') !== false) {
            $escaped_song_name = substr($song_name, 0, strpos($song_name, '&')) . '%26' . substr($song_name, strpos($song_name, '&') + 1);
        } if (strpos($artist_name, '&') !== false) {
            $escaped_artist_name = substr($artist_name, 0, strpos($artist_name, '&')) . '%26' . substr($artist_name, strpos($artist_name, '&') + 1);
        }

        $newString = '<a href="https://tommymadden.com/slides/slides_request.php?song_name=' . $escaped_song_name . '&artist_name=' . $escaped_artist_name . '">' . $song_name . ' by ' . $artist_name . '</a><br />';
        echo $newString . "\n";
    } else {
        echo $pieces[$i] . "\n";
    }
}
