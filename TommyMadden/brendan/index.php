<?php
/**
 * Created by Madden Industries - http://tommymadden.com
 *
 */

session_start();

include("top_bar.php");
?>

<html>
<head>
    <link href="css/top_bar.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre|Rubik" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="jquery.localscroll.js" type="text/javascript"></script>
    <script src="jquery.scrollTo.js" type="text/javascript"></script>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <link href="css/universals.css" rel="stylesheet" type="text/css" />
</head>
<body onload="scaleImgs()" onresize="scaleImgs()">

<div id="top_bar">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#links').localScroll({duration:800});
        });
    </script>

    <div id="links">
        <a class="top_link" href="#homelink">HOME</a>
        <a class="top_link" href="#reellink">REEL</a>
        <a class="top_link" href="#portfoliolink">PORTFOLIO</a>
        <a class="top_link" href="#aboutlink">ABOUT</a>
        <a class="top_link" href="#contactlink">CONTACT</a>
    </div>
</div>
<div id="content_container">
    <div id="content">
        <a name="homelink"></a>

        <div id="spacer"></div>

        <p class="title"><b>DIGITAL MINT</b></p>
        <p class="sub_title">Creator and Visual Effects Artist</p>
        <p class="paragraph">
            Hi this is a long paragraph about random stuff I don't really care about!
        </p>
        <a name="reellink"></a>

        <div id="spacer"></div>

        <div class="section_divider">
            <p class="section_divider_text">
                Reel
            </p>
        </div>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>

        <a name="portfoliolink"></a>

        <div id="spacer"></div>

        <div class="section_divider">
            <p class="section_divider_text">Portfolio</p>
        </div>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>


        <a name="aboutlink"></a>

        <div id="spacer"></div>

        <div class="section_divider">
            <p class="section_divider_text">About</p>
        </div>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>


        <a name="contactlink"></a>

        <div id="spacer"></div>

        <div class="section_divider">
            <p class="section_divider_text">Contact</p>
        </div>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/8G3lk-kMkkc" frameborder="0" allowfullscreen></iframe>


        <!--div id="scroll_div">
            <img src="img/logo.jpg" class="scrolling_bg" id="scroll_1" />
            <p class="scrolling_txt">This is soon to be the scrolly text!</p>
        </div>

        <script>
            $(document).ready(function(){

                var $window = $(window); //You forgot this line in the above example

                $('section[data-type="background"]').each(function(){
                    var $bgobj = $(this); // assigning the object
                    $(window).scroll(function() {
                        var yPos = -($window.scrollTop() / $bgobj.data('speed'));
// Put together our final background position
                        var coords = '50% '+ yPos + 'px';
// Move the background
                        $bgobj.css({ backgroundPosition: coords });
                    });
                });

                $('article[data-type="text"]').each(function() {
                    var $text = $(this);
                    $(window).scroll(function() {
                        var yPos = -($window.scrollTop() / $text.data('speed'));
                        var coords = '50% ' + yPos + 'px';

                        $text.css({ backgroundPosition: coords });
                    });
                });
            });
        </script>

        <section data-type="background" data-speed="10" id="home">
            <article data-type="text" data-speed="2">This is some scrolly text</article>
        </section>

        <div id="about_brendan">

        <div class="profile">
            <div class="picture">
                <img src="img/profile.jpg" class="profile_img" />
                <h2 class="title" id="title">Brendan Forde: Founder</h2>
            </div>
            <div class="description" id="description">
                <span>Brendan is the founder, creator, and primary contractor for Visual Effects work with Digital Mint productions. He is dedicated, responsible, and timely, always retaining his friendliness and his creative taste for making Visual Effects shine.</span>
            </div>
        </div>
    </div-->


    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</body>
</html>
