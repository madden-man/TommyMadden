<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 3/14/18
 * Time: 2:19 PM
 */

/* create a dom document with encoding utf8 */
$domtree = new DOMDocument('1.0', 'UTF-8');

/* create the root element of the xml tree */
$xmlRoot = $domtree->createElement("NewsItem");
/* append it to the document created */
$xmlRoot = $domtree->appendChild($xmlRoot);

$articleid = $_REQUEST['articleid'];
$xmlRoot->appendChild($domtree->createElement('ARTICLEID', $articleid));

$dateline = $_REQUEST['dateline'];
$xmlRoot->appendChild($domtree->createElement('DATELINE', $dateline));

$headline = $_REQUEST['headline'];
$xmlRoot->appendChild($domtree->createElement('HEADLINE', $headline));

$summary = $_REQUEST['summary'];
$xmlRoot->appendChild($domtree->createElement('SUMMARY', $summary));

$newslinetext = $_REQUEST['newsline'];
$xmlRoot->appendChild($domtree->createElement('NEWSLINETEXT', $newslinetext));

$byline = $_REQUEST['byline'];
$xmlRoot->appendChild($domtree->createElement('BYLINE', $byline));

$source = $_REQUEST['source'];
$xmlRoot->appendChild($domtree->createElement('SOURCE', $source));

$keywords = $_REQUEST['keywords'];
$xmlRoot->appendChild($domtree->createElement('KEYWORDS', $keywords));

$attachment = $_FILES['attachment1']['name'];
if (isset($_FILES['attachment2']['name']))
{
    $attachment .= ', ' . $_FILES['attachment2']['name'];
}
if (isset($_FILES['attachment3']['name']))
{
    $attachment .= ', ' . $_FILES['attachment3']['name'];
}

$xmlRoot->appendChild($domtree->createElement('ATTACHMENT', $attachment));

mkdir('./' . $articleid);
$file = fopen("./" . $articleid . '/' . $articleid . '.xml', 'w');
chmod($file,0777);
fwrite($file, $domtree->saveXML());
fclose($file);

//echo $domtree->saveXML();

$uploaddir = './' . $articleid . '/' . $_FILES['attachment1']['name'];

if (move_uploaded_file($_FILES['attachment1']['tmp_name'], $uploaddir))
{
    // Worked
}
else
{
    echo "<h1>Normal upload didn't work 1!</h1>";
}

if (isset($_FILES['attachment2']['name']) && strlen($_FILES['attachment2']['name']) > 0)
{
    $uploaddir = './' . $articleid . '/' . $_FILES['attachment2']['name'];

    if (move_uploaded_file($_FILES['attachment2']['tmp_name'], $uploaddir))
    {
        // Worked
    }
    else {
        echo "<h1>Normal upload didn't work 2!</h1>";
    }
}

if (isset($_FILES['attachment3']['name']) && strlen($_FILES['attachment3']['name']) > 0)
{
    $uploaddir = './' . $articleid . '/' . $_FILES['attachment3']['name'];

    if (move_uploaded_file($_FILES['attachment3']['tmp_name'], $uploaddir))
    {
        // Worked
    }
    else {
        echo "<h1>Normal upload didn't work 3!</h1>";
    }
}

$ftp_server = "ftp.tommymadden.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to FTP Server!");
$login = ftp_login($ftp_conn, "ericsson@tommymadden.com", "(=V#6gbx:+5}4GYc");
ftp_chmod($ftp_conn, 0777);

$remote_filename = $articleid . ".xml";
$local_filename = './' . $articleid . '/' . $articleid . '.xml';

if (ftp_put($ftp_conn, $remote_filename, $local_filename, FTP_ASCII))
{
    // great
}
else
{
    die("Problem with XML!");
}

$remote_filename = $_FILES['attachment1']['name'];
$local_filename = './' . $articleid . '/' . $_FILES['attachment1']['name'];

if (ftp_put($ftp_conn, $remote_filename, $local_filename, FTP_BINARY))
{
    // great
}
else
{
    die("Problem with attachment" . $local_filename . "!");
}

if (isset($_FILES['attachment2']['name']) && strlen($_FILES['attachment2']['name']) > 0)
{
    $remote_filename = $_FILES['attachment2']['name'];
    $local_filename = './' . $articleid . '/' . $_FILES['attachment2']['name'];

    if (ftp_put($ftp_conn, $remote_filename, $local_filename, FTP_BINARY))
    {
        // great
    }
    else
    {
        die("Problem with attachment" . $local_filename . "!");
    }
}

if (isset($_FILES['attachment3']['name']) && strlen($_FILES['attachment3']['name']) > 0)
{
    $remote_filename = $_FILES['attachment3']['name'];
    $local_filename = './' . $articleid . '/' . $_FILES['attachment3']['name'];

    if (ftp_put($ftp_conn, $remote_filename, $local_filename, FTP_BINARY))
    {
        // great
    }
    else
    {
        die("Problem with attachment" . $local_filename . "!");
    }
}



ftp_close($ftp_conn);


header('Location: https://tommymadden.com/xml_form/files');
