<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 5/9/2017
 * Time: 5:57 PM
 */

$post_name = $_GET['post_name'];

include("navbar.php");
?>
<head>
    <link href="https://tommymadden.com/blog/css/post.css" type="text/css" rel="stylesheet" />
    <?php

    if ($post_name == "love_and_war") {
        echo "<title>Love and War</title>";
    } else if ($post_name == "whatislove") {
        echo "<title>What is Love?</title>";
    }

    ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/&#10;libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".submit").click(function() {
                var name = $("#name").val();
                var comment = $("#comment_txt").val();
                var postname = '<?php echo $post_name; ?>';
                var datastring = 'name=' + name + '&comment=' + comment + '&postname=' + postname;

                if (name == '' || comment == '') {

                } else {

                    $.ajax({
                        type: "POST",
                        url: "http://tommymadden.com/blog/submit_comments.php",
                        data: datastring,
                        success: function() {

                        }
                    });


                }

                return false;
            });
        });
    </script>

</head>
<div class="post_container">
    <div class="post">
        <?php include("posts/" . $post_name . ".php"); ?>
    </div>
</div>

<?php

function getComments()
{

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_comments");
    $results = $mysqli->query("SELECT name, comment FROM comments WHERE post_name='" . $post_name . "';");

    while ($row = $results->fetch_assoc()) {
        echo "<div class='comment'>";
        printf("<h2>%s: </h2> <h4>%s</h4>", $row['name'], $row['comment']);
        echo "</div>";
    }

    $results->free();
    $mysqli->close();

}

getComments();

?>

<form method="post" name="form">

    <div class="comments_bar">
        <div id="name_div">
            <label for="name">Name: </label><input type="text" name="name" id="name" />
        </div>
        <div id="comment_div">
            <label for="comment_txt">Comment: </label><textarea type="text" name="comment_txt" id="comment_txt"></textarea>
        </div>
        <input type="submit" value="Submit!" class="submit" />

    </div>
</form>



<?php

include("post_list.php");

?>
