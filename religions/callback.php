<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/2/17
 * Time: 10:30 PM
 */

require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "960628120809189376-cLzum21EfEx17CPcBz1qZb7KCGYZ2pH",
    'oauth_access_token_secret' => "udIEplUhEQggoIfLSPxaIIREMPfAB1xpkGTl6ulbxgvzV",
    'consumer_key' => "BByjLuG9YIa6w67iCUyOW7Kd4",
    'consumer_secret' => "i9kRDI8FC7nhzoC3GAJssZ3U6SIgpzcn1S9miGOsBZphpVbXVg"
);

$twitter = new TwitterAPIExchange($settings);

$url = "https://api.twitter.com/1.1/search/tweets.json?q=donald%20trump&src=typd";

$getfield = '?q=hello';

$result = $twitter->setGetfield($getfield)
                    ->buildOauth($url, "GET")
                    ->performRequest();

echo var_dump($result);

$result_array = @json_decode($result, 1);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Twitter Search</title>
    <link href="css/slides.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
</head>
<body>
<br><br>
<form action="">

    Search Tweets: <input type="text" placeholder="Enter a search query here!" />
    <input type="submit">
</form>
</body>
</html>