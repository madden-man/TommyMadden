<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/4/17
 * Time: 4:12 PM
 */


if (isset($_POST['book']) && isset($_POST['chapter']) && isset($_POST['verse']) && isset($_POST['note']))
{
    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_bible_notes");

    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $verse = $_POST['verse'];
    $note = mysqli_real_escape_string($mysqli, $_POST['note']);

    if (strpos($verse, '-') !== -1) {
        $beginVerse = substr($verse, 0, strpos($verse, '-'));
        $endVerse = substr($verse, strpos($verse, '-') + 1);

        $query = "INSERT INTO `tommraed_bible_notes`.`notes` (`book`, `chapter`, `verse`, `multiverse`, `note`)"
            . " VALUES ('" . $book . "', '" . $chapter . "', '" . $beginVerse . "', '" . $endVerse . "', '" . $note . "')";
    } else {

        $query = "INSERT INTO `tommraed_bible_notes`.`notes` (`book`, `chapter`, `verse`, `note`)"
            . " VALUES ('" . $book . "', '" . $chapter . "', '" . $verse . "', '" . $note . "')";
    }

    $wasSuccessful = $mysqli->query($query);

    if  ($wasSuccessful === true) {
        // i dont care
        if (isset($_POST['version'])) {
            header('Location: index.php?book='.$book.'&chapter='.$chapter/*.'&version='.$_POST['version']*/);
        } else {
            header('Location: index.php?book='.$book.'&chapter='.$chapter);
        }
    } else {
        echo "Didn't work!";
    }

}
