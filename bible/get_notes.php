<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 2/15/2019
 * Time: 12:37 PM
 */

include 'numToBook.php';

$mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_bible_notes");

if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    $results = $mysqli->query("SELECT * FROM notes");
    while ($row = $results->fetch_assoc()) {
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        $multiverse = $row['multiverse'];
        $note = $row['note'];

        if ($multiverse === "0" &&
            (!isset($_POST['book_name']) || $_POST['book_name'] === $book) &&
            (!isset($_POST['chap_num']) || $_POST['chap_num'] === $chapter)) {

            $className = 'v' . (bookToNum($book) + 1) . '_' . $chapter . '_' . $verse;
            $idName = $book . '.' . $chapter . '.' . $verse;

            printf("<div class='bible-note secret ".$className."' id='".$idName."'>".$note." -- ".$book." ".$chapter.":".$verse."</div>|");
        } else if ($multiverse !== "0" &&
            (!isset($_POST['book_name']) || $_POST['book_name'] === $book) &&
            (!isset($_POST['chap_num']) || $_POST['chap_num'] === $chapter)) {
            $className = 'v' . (bookToNum($book) + 1) . '_' . $chapter . '_' . $verse . '-' . $multiverse;
            $idName = $book . '.' . $chapter . '.' . $verse . '-' . $multiverse;

            printf("<div class='bible-note secret ".$className."' id='".$idName."'>".$note." -- ".$book." ".$chapter.":".$verse."-".$multiverse."</div>|");
        }
    }

    /* free result set */
    $results->free();
}

?>