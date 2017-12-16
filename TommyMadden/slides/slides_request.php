<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/2/17
 * Time: 10:30 PM
 */

$user_name = $_GET['user_name'];
$song_name = $_GET['song_name'];
$artist_name = $_GET['artist_name'];

$url_song_name = noPunctuation($song_name);
$url_artist_name = noPunctuation($artist_name);
if (strpos($url_artist_name, 'the') === 0) {
    $url_artist_name = substr($url_artist_name, 3);
}


$query_song_name = strtolower($song_name);

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

$url = 'https://www.azlyrics.com/lyrics/' . $url_artist_name . '/' . $url_song_name . '.html';
$headers = @get_headers($url);

if(strpos($headers[0],'200')===false) {
    header('Location: search_request.php?q=' . str_replace(' ', '+', $song_name) . '+' . str_replace(' ', '+', $artist_name));
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);



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
        $real_song_name = substr($pieces[$i], strpos($pieces[$i],"<b>") + 4, strpos($pieces[$i], "</b>") - 5);
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
    /*        if (substr_count($pieces[$i], '?') > 1) {
                $j = 0;
                while ($j < substr_count($pieces[$i], '?')) {
                    $blockSoFar .= substr($pieces[$i], strpos($pieces[$i], '?') + 1) . "\n";
                    $numLines++;
                    $pieces[$i] = substr($pieces[$i], strpos($pieces[$i], '?'));
                }
            } else if (count($pieces[$i]) > 60) {
                $j = 0;
                while ($j < substr_count($pieces[$i], '?')) {
                    $blockSoFar .= substr($pieces[$i], strpos($pieces[$i], '?') + 1) . "\n";
                    $numLines++;
                    $pieces[$i] = substr($pieces[$i], strpos($pieces[$i], '?'));
                }
            } else { */
                $blockSoFar .= $pieces[$i] . "\n";
                $numLines++;
       //     }
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
    <link href="css/slides.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
</head>
<body>

<div id="lyrics_holder">

<?php

$chorusBlock = -1;
for ($i = 0; $i < sizeof($block); ++$i) {
    echo "<a id='link-" . $i . "'></a>\n\n<div class='spacer' id='spacer" . $i . "'></div>\n\n<div class='lyrics' id='lyric" . $i . "'>\n\n<p contenteditable='false' class='text-holder' onclick='$(this).focus();'>" . $block[$i] . "</p>\n</div>\n<br><br>\n\n";
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