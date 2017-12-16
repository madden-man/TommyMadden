<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/2/17
 * Time: 10:30 PM
 */

$song_names = $_SESSION['song_names'];
$artist_names = $_SESSION['artist_names'];
$song_block = "";
for ($i = 0; $i < sizeof($song_names); ++$i) {
    $song_name = $song_names[$i];
    $artist_name = $artist_names[$i];
    $query_song_name = strtolower($song_name);
    $data = findLyrics($song_name, $artist_name);
    $block = breakApartLyrics($data, $query_song_name);
    $song_block[$i] = $block;
}

function findLyrics($song_name, $artist_name)
{

    $url_song_name = noPunctuation($song_name);
    $url_artist_name = noPunctuation($artist_name);
    if (strpos($url_artist_name, 'the') === 0) {
        $url_artist_name = substr($url_artist_name, 3);
    }


    $url = 'https://www.azlyrics.com/lyrics/' . $url_artist_name . '/' . $url_song_name . '.html';
    $headers = @get_headers($url);

    if (strpos($headers[0], '200') === false) {
        header('Location: search_request.php?q=' . str_replace(' ', '+', $song_name) . '+' . str_replace(' ', '+', $artist_name));
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;

}


function breakApartLyrics($data, $query_song_name)
{

    $pieces = explode("\n", $data);
    $shouldStartSpeaking = false;
    $block = "";
    $blockSoFar = "";
    $numBlocks = 0;
    $real_song_name = "";
    $real_artist_name = "";
    $numLines = 0;

    for ($i = 0; $i < sizeof($pieces); ++$i) {
        if (strpos($pieces[$i], '<h2><b>') !== false) {
            $artist_name_begin = strpos($pieces[$i], '<h2><b>') + 7;
            $artist_name_end = strpos($pieces[$i], '</b>') - 14;
            $real_artist_name = substr($pieces[$i], $artist_name_begin, $artist_name_end);
        }

        if (strpos(strtolower($pieces[$i]), '<b>"' . $query_song_name . '"</b>') !== false) {
            $shouldStartSpeaking = true;
            $blockSoFar = "";
            $real_song_name = substr($pieces[$i], strpos($pieces[$i], "<b>") + 4, strpos($pieces[$i], "</b>") - 5);
        }


        if ($shouldStartSpeaking && $pieces[$i] === "<br>" ||
            ($shouldStartSpeaking && strpos($pieces[$i], "<div>") !== false) ||
            ($shouldStartSpeaking && strpos($pieces[$i], "</div>") !== false)) {
            $block[$numBlocks] = trim($blockSoFar);
            $numBlocks += 1;
            $blockSoFar = "";
        } else {
            if (strpos($pieces[$i], '</b><br>') !== false) {
                if (strpos($pieces[$i], '(') !== false) {
                    $pieces[$i] = substr($pieces[$i], 0, strpos($pieces[$i], '(')) . '<br>' . substr($pieces[$i], strpos($pieces[$i], '('));
                }
                $blockSoFar .= $pieces[$i] . "By " . $real_artist_name . "<br>\n";
                $numLines++;
            } else {
                $blockSoFar .= $pieces[$i] . "\n";
                $numLines++;
            }
        }

        if (strpos($pieces[$i], '<!-- MxM banner -->') !== false) {
            $shouldStartSpeaking = false;
        }
    }

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

    return $block;

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

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $real_song_name . ' by ' . $real_artist_name ?></title>
    <link href="css/cum_slides.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
</head>
<body>

    <?php
    $longestblock = 0;
    for ($i = 1; $i < sizeof($song_block); ++$i) {
        if (sizeof($song_block[$i]) > sizeof($song_block[$longestblock])) {
            $longestblock = $i;
        }
    }


    for ($i = 0; $i < sizeof($song_block); ++$i) {
        echo "<div class='lyrics_holder' id='$i'>";

        for ($j = 0; $j < $longestblock; ++$j) {
            echo "<a id='song" . $i . "link" . $j . "'></a>\n\n<div class='spacer' id='spacersong" . $i . "link" . $j . "'></div>\n\n<div class='lyrics' id='lyric" . $i . "'>\n\n" . $block[$i] . "\n</div>\n<br><br>\n\n";
        }

        echo "</div>";
    }


    ?>
</div>
<script>

    $(document).ready(function() {

        $('.lyrics_holder').each(function() {
            var id = parseInt(this.id);
            attr('left', document.innerWidth * id);
        });
    });

    function setInitialHeights(numBlocks) {
        for (var i = 0; i < numBlocks; ++i) {
            var spacerstring = "#spacer" + i;
            var lyricsstring = "#lyric" + i;
            var spacerHeight = (window.innerHeight / 2) - ($(lyricsstring).height() * 3 / 4);
            $(spacerstring).css("height", spacerHeight + "px");
        }
    }
    var numSongs = <?php echo sizeof($song_block); ?>
    var numBlocks = <?php echo sizeof($block); ?>

        setInitialHeights(numBlocks);

    var currentSong = 0;
    var currentBlock = 0;

    $(window).keydown(function(event) {
        var which = event.which;
        if (which === 40 || which === 39 || which === 32 || which === 34) {
            event.preventDefault();
            if (currentBlock <= numBlocks) {
                currentBlock++;
            }
            $('html,body').animate({scroll: $("#song" . currentSong . "link" + currentBlock))});
            //      $(window.location = "#link-" + currentBlock);
        } else if (which === 38 || which === 33) {
            event.preventDefault();
            if (currentBlock > 0) {
                currentBlock--;
            }
            $('html,body').animate({scroll: $("#song" . currentSong . "link" + currentBlock))});
            //       $(window.location = "#link-" + currentBlock);
        } else if (which === 37) {
            event.preventDefault();
            if (currentSong > 0) {
                currentSong--;
            }
        $('html,body').animate({scroll: $("#song" . currentSong . "link" + currentBlock))});
        } else if (which === 39) {
            event.preventDefault();
        if (currentBlock <= numBlocks) {
            currentBlock++;
        }
        $('html,body').animate({scroll: $("#song" . currentSong . "link" + currentBlock))});
        }
    });

    $(window).click(function(event) {
        event.preventDefault();
        if (currentBlock <= numBlocks) {
            currentBlock++;
        }
        $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top},'fast');
    });

    $(window).swipe( {
        //Single swipe handler for left swipes
        swipeUp:function(event, direction, distance, duration, fingerCount, fingerData) {
            event.preventDefault();
            if (currentBlock <= numBlocks) {
                currentBlock++;
            }
            $('html,body').animate({scrollTop: $("#link-" + currentBlock).offset().top}, 'fast');
        }, swipeDown:function(event, direction, distance, duration, fingerCount) {
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

function noPunctuation($string) {
    $newString = "";
    $length = strlen($string);
    for ($i = 0; $i < $length; ++$i) {
        $ascii = ord(substr($string, $i));
        if ($ascii >=  48 && $ascii <= 57) {

            // Numbers
            $newString .= chr($ascii);

        } else if ($ascii >= 65 && $ascii <= 90) {

            // Uppercase letters
            $newString .= chr($ascii + 32);

        } else if (ord(substr($string, $i)) >= 97 && ord(substr($string, $i)) <= 122) {

            // Lowercase letters
            $newString .= chr($ascii);

        }
    }

    return $newString;
}

?>