<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 2/23/18
 * Time: 8:42 PM
 */

if (isset($_POST['articleid'])) {

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

    Header('Content-type: text/xml');
    Header('Content-Disposition: attachment; filename=' . $articleid . '.xml');
    /* get the xml printed */
    echo $domtree->saveXML();

}

?>