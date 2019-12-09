<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 3/28/18
 * Time: 1:40 PM
 */

if (isset($_POST['lyrics']))
{
    $real_artist_name = $_REQUEST['artist'];
    $real_song_name = $_REQUEST['song'];

    $data = $_REQUEST['lyrics'];

    $pieces = explode("\n", $data);
    $block = "";
    $blockSoFar = "";
    $numLines = 0;

    $block[0] = "<b>\"" . $real_song_name . "\"</b><br>\n";
    $block[0] .= "By " . $real_artist_name;

    $numBlocks = 1;

    for ($i = 0; $i < sizeof($pieces); ++$i) {

        if (strlen($pieces[$i]) < 2) {
            $block[$numBlocks] = trim($blockSoFar);
            $numBlocks += 1;
            $blockSoFar = "";
        } else {
            $blockSoFar .= $pieces[$i] . "<br>\n";
            $numLines++;
        }
    };

    $block[$numBlocks] = "";
    $numBlocks++;
    for ($i = 0; $i < $numBlocks; ++$i) {
        if (substr_count($block[$i], '<br>') > 6) {
            $first_block = substr($block[$i], 0, getPosition($block[$i], "<br>", 4));
            $second_block = substr($block[$i], getPosition($block[$i], "<br>", 4));

            $block[$i] = $first_block;


            for ($j = $numBlocks+ 1; $j > $i + 1; --$j) {
                $block[$j] = $block[$j - 1];
            }

            $block[$i + 1] = $second_block;

            $numBlocks++;

        }
    }


    ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $real_song_name . ' by ' . $real_artist_name ?></title>
    <link href="css/slides.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
</head>
<body>

<div id="lyrics_holder">

    <?php

    $chorusBlock = -1;
    for ($i = 0; $i < sizeof($block); ++$i) {
        echo "<a id='link-" . $i . "'></a>\n\n";
        echo "<div class='spacer' id='spacer" . $i . "'></div>\n\n";
        echo "<div class='lyrics' id='lyric" . $i . "'>\n\n";
        echo "<p contenteditable='false' class='text-holder' onclick='$(this).focus();'>" . $block[$i] . "</p>\n";
        echo "</div>\n<br><br>\n\n";
        if (strpos($block[$i], "Chorus") !== false && $chorusBlock == -1) {
            $chorusBlock = $i;
        }
    }


    ?>
</div>
<script>

    function setSpacerHeights(numBlocks) {
        for (var i = 0; i < numBlocks; ++i) {
            var spacerstring = "#spacer" + i;
            var lyricsstring = "#lyric" + i;
            var spacerHeight = (window.innerHeight / 3) - ($(lyricsstring).height() / 2);
            $(spacerstring).css("height", spacerHeight + "px");
        }
    }

    var numBlocks = <?php echo $numBlocks; ?>;

    var chorusBlock = <?php echo $chorusBlock;  ?>;
    var verseBlock = -1;

    var editable = false;

    setSpacerHeights(numBlocks);

    var currentBlock = 0;

    $(window).keydown(function(event) {
        var which = event.which;
        if (editable === false && (which === 40 || which === 39 || which === 32 || which === 34)) {
            event.preventDefault();
            if (currentBlock <= numBlocks) {
                currentBlock++;
            }
            $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top},'fast');
            //      $(window.location = "#link-" + currentBlock);
        } else if (editable === false && (which === 38 || which === 37 || which === 33)) {
            event.preventDefault();
            if (currentBlock > 0) {
                currentBlock--;
            }
            $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top},'fast');
            //       $(window.location = "#link-" + currentBlock);
        } else if (editable === false && which === 67) {
            event.preventDefault();
            if (verseBlock !== -1) {
                currentBlock = verseBlock;
                verseBlock = -1;
                $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top},'fast');
            } else if (chorusBlock !== -1) {
                verseBlock = currentBlock;
                currentBlock = chorusBlock;
                $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top},'fast');
            }
        } else if (which === 220) {
            event.preventDefault();
            if (editable) {
                $(".text-holder").each(function() {
                    $(this).attr('contenteditable', 'false');
                });
                editable = false;
            } else {
                $(".text-holder").each(function() {
                    var currentText = this.innerHTML;
                    $(this).attr('contenteditable', 'true');
                    $(this).innerHTML = (currentText);
                });
                editable = true;
            }
            setSpacerHeights(numBlocks);
        }
    });



    $(window).click(function(event) {
        if (editable === false) {
            event.preventDefault();
            if (currentBlock <= numBlocks) {
                currentBlock++;
            }
            $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top}, 'fast');
        }
    });

    $(window).swipe( {
        //Single swipe handler for left swipes
        swipeUp:function (event, direction, distance, duration, fingerCount, fingerData) {
            event.preventDefault();
            if (currentBlock <= numBlocks) {
                currentBlock++;
            }
            $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top}, 'fast');
        }
        ,
        swipeDown:function (event, direction, distance, duration, fingerCount) {
            event.preventDefault();
            if (currentBlock > 0) {
                currentBlock--;
            }
            $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top}, 'fast');
        }
    });

</script>
</body>
</html>
<?php
}
else
{

?>
<html>
<head>
    <link href="css/form.css" rel="stylesheet" />
</head>
<!--<body>-->
<!--<form action="" method="post" style="text-align: center; width: 100%; margin: auto;">-->
<!--    Song Name: <br><input type="text" name="song" /><br><br>-->
<!--    Artist Name: <br><input type="text" name="artist" /><br><br>-->
<!--    Lyrics: <br><textarea name="lyrics" style="height: 400px; width: 300px;"></textarea><br><br>-->
<!--    <input type="submit" />-->
<!--</form>-->
<!--</body>-->
<body>
<h1>Custom Slides Request!</h1>
<h3>Enter the lyrics yourself, because we couldn't find them on our own!</h3>

<div id="form_container_container">
    <form method="post" class="form_container" enctype="multipart/form-data" action="" autocomplete="off">
        <div id="text_container">
            <div class="form">Song Name: <br /><input type="text" name="song" placeholder="e. g. Pieces" class="form_input" id="input_song_name"/></div><br />
            <div class="form">Song Artist: <br /><input type="text" name="artist" placeholder="e. g. Bethel Music" class="form_input"/></div><br />
            <div class="form">Lyrics: <br><textarea name="lyrics" style="height: 400px; width: 300px;"></textarea></div><br><br>

            <section class="press">
                <button type="submit">Go!</button>
            </section>
        </div>
    </form>
</div>
</body>
</html>

<?php
}

function getPosition($string, $subString, $index) {
    $arr = explode($subString, $string);
    $pos = 0;
    for ($i = 0; $i < $index; ++$i) {
        $pos += strlen($arr[$i]) + 4;
    }
    return $pos;
}

?>