<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 9/19/2017
 * Time: 1:14 PM
 */

?>

<?php
$token = 'PkhPVC91PG8wFi3ArsIguHTDNjLbIPKfeSGlHyKy';
$url = 'https://bibles.org/v2/books/eng-GNTD:2Tim/chapters.xml';

// Set up cURL
$ch = curl_init();
// Set the URL
curl_setopt($ch, CURLOPT_URL, $url);
// don't verify SSL certificate
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// Return the contents of the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// Follow redirects
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// Set up authentication
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$token:X");

// Do the request
$response = curl_exec($ch);
curl_close($ch);

print($response);
?>
