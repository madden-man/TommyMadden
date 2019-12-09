<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 1/8/18
 * Time: 6:02 PM
 */

$book_name = 'Gen';
if (isset($_GET['book_name'])) {
    $book_name = $_GET['book_name'];
}

$real_name = 'Genesis';
if (isset($_GET['full_name'])) {
    $real_name = $_GET['full_name'];
}

$chap = 1;
if (isset($_GET['chap_num'])) {
    $chap = $_GET['chap_num'];
}

$version = 'eng-KJV';
if (isset($_GET['version'])) {
    $version = $_GET['version'];
}

$token = 'PkhPVC91PG8wFi3ArsIguHTDNjLbIPKfeSGlHyKy';

$url = 'https://bibles.org/v2/chapters/' . $version . ':' . $book_name . '.' . $chap . '.xml';

$response = "";

$response .= '<h2>' . $real_name . ' ' . $chap . '</h2><hr>';

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
$data = curl_exec($ch);

curl_close($ch);

$response .= '<style> auditid { display: none; }</style>';

$response .= substr($data, 0, strpos($data, '</div>'));

echo $response;