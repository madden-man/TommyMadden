<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 3/15/18
 * Time: 11:36 PM
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

$deleted = unlink("./files/" . $articleid . '/' . $articleid . '.xml');
$file = fopen("./files/" . $articleid . '/' . $articleid . '.xml', 'w');
chmod($file,0777);
fwrite($file, $domtree->saveXML());
fclose($file);

header('Location: https://www.tommymadden.com/xml_form/files/');