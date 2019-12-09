<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 1/4/18
 * Time: 9:50 AM
 */

include("numToBook.php");

$token = 'PkhPVC91PG8wFi3ArsIguHTDNjLbIPKfeSGlHyKy';

$random_book = rand(0, 65);

$book_name = numToBook($random_book);

$url = 'https://bibles.org/v2/books/eng-GNTD:' . $book_name . '/chapters.xml';

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


$num_chapters = substr_count($response, 'All rights reserved.') - 1;


$random_chap = rand(0, $num_chapters - 1) + 1;

$url = 'https://bibles.org/v2/chapters/eng-GNTD:' . $book_name . '.' . $random_chap . '.xml';

echo $book_name . ' ' . $random_chap . '<br>';

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

echo '<style> auditid { display: none; }</style>';

echo substr($response, 0, strpos($response, '</div>'));

?>