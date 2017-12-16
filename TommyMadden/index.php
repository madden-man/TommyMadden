<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 8/28/2017
 * Time: 8:21 PM
 */

include("analyticstracking.php");


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">




<html>

<head>
    <meta name="viewport" content="width=700" />

    <link href="https://fonts.googleapis.com/css?family=Arvo|Open+Sans|Secular+One|Vast+Shadow" rel="stylesheet">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link href="css/fonts.css" type="text/css" rel="stylesheet">
    <link href="css/portfolio.css" type="text/css" rel="stylesheet" />
    <link href="css/contact.css" type="text/css" rel="stylesheet" />

    <meta name="Keywords" content="Tommy, Madden, website, christian, love, faith, people, man, program, service, programming, development" />
    <meta name="Description" content="Tommy Madden is a Christian Web developer who develops websites for people through an elaborate and precise design process, giving each customer exactly what he/she needs. This service is performed in the hopes that Tommy would become a more experienced programmer and ultimately that he would benefit the world with his services." />
    <title>Tommy Madden: Android, Web, and Game Developer</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script>

        var didScroll;

        $(window).scroll(function() {
            didScroll = true;
        });

        setInterval(function() {
            if ( didScroll ) {
                didScroll = false;
                doTabThing();
            }
        }, 250);

        function doTabThing() {
            var home = $(".home_pos").offset().top;

            var portfolio = $(".portfolio_pos").offset().top;

            var about = $(".about_pos").offset().top;

            var contact = $(".contact_pos").offset().top;

            if ($(window).scrollTop() >= contact) {
                $(".current").removeClass("current");
                $(".contact").addClass("current");
            } else if ($(window).scrollTop() >= about) {
                $(".current").removeClass("current");
                $(".about").addClass("current");
            } else if ($(window).scrollTop() >= portfolio) {
                $(".current").removeClass("current");
                $(".portfolio").addClass("current");
            } else {
                $(".current").removeClass("current");
                $(".home").addClass("current");
            }
        }

        function doBlogThing() {
            $(".current").removeClass("current");
            $(".blog").addClass("current");
        }

        $(function () {

            $('form').on('submit', function (e) {

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: 'submit_contact_form.php',
                    data: $('form').serialize(),
                    success: function () {
                        success();
                    }
                });

            });

        });

        function success() {
            $('.form_successful').fadeIn(200).show();
            $('.error').fadeOut(200).hide();

            setTimeout(function() {
                $('.form_successful').fadeOut(1000).show();

            }, 2000);
        }

    </script>

    <?php include("comodo_head_script.php"); ?>

</head>
<body onload="doTabThing()">

<div class="form_successful">Your message has been received! You will be contacted shortly.</div>
<div class="error">Your message was not received. We may be having technical difficulties.</div>

<div id="container">
    <div id="tab_holder">
        <img id="top_bar_img_holder" src="img/grid_top_bar.png" />
        <ul id="main-nav">
            <li class="home" onclick="doTabThing()"><a href="#link-home">Home</a></li>
            <li class="portfolio" onclick="doTabThing()"><a href="#link-portfolio">Portfolio</a></li>
            <li class="about" onclick="doTabThing()"><a href="#link-about">About</a></li>
            <li class="contact" onclick="doTabThing()"><a href="#link-contact">Contact</a></li>
            <li class="blog" onclick="doBlogThing()"><a href="https://tommymadden.com/blog/">Blog</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div><a id="link-home" class="home_pos"></a></div>

    <div id="content_container">
        <div id="content">

            <div class="spacer"></div>

            <div class="header2">Welcome to <br/></div>
                <div class="header1">TommyMadden.com!</div>

            <a href="personal/Resume_Thomas_Madden.pdf"><div id="profile_pic"></div></a>

            <p class="intro">As you may have guessed, my name is Tommy Madden.

I am a programmer studying Computer Science at Chapman University.

I have always had an immense passion to make the world a better place, and wish to use my skills in the areas of Web, Android, and Game Development to impact the world in a positive way.

To get there, however, I need more experience, more connections, and more patience.

Although I am currently a full-time student at Chapman, I also make time to independently develop websites (such as this one) which push the boundaries of the normal when it comes to Web development. If you are in need of my services, click the 'Contact' link above, fill out the form and I will get back to you shortly.

And, as always, if you would like to partner with me on a project (related to Web, Android, or Game Development in particular) because of my experience in those areas, feel free to email me at madde120@mail.chapman.edu.
            </p>


            <a id="link-portfolio" class="portfolio_pos"></a>
            <div class="spacer"></div>
            <div class="header_container"><span class="header3">Portfolio</span></div>

            <a href="https://tommymadden.com/personal/Resume_Thomas_Madden.pdf"><div class="resume_holder">View Tommy Madden's Resume!</div></a>


            <div class="project_container" id="trogdor_game">
                <a href="https://github.com/monty816/TrogdorGame/tree/master/TrogdorGame/Trogdor">
                    <img src="https://tommymadden.com/img/trogdor_facing-left_fireon.jpg" class="project_img" id="trogdor_game_img"/>
                    <h1 class="project_title">Trogdor vs. Sharknado Game!</h1>
                </a>
                <p class="project_desc">I created a desktop game in which the player (a dragon named Trogdor) shoots fire at sharks as they fly towards him. Through this project I learned some of the best practices for game development, more refined graphic design, and how to create sturdy game mechanics. WASD controls with the space bar.</p>
            </div>
            <div class="project_container" id="madden_clan">
                <a href="https://github.com/monty816/MaddenClan">
                    <img src="https://tommymadden.com/img/defaultProfile.jpg" class="project_img" id="madden_clan_img" />
                    <h1 class="project_title">Madden Clan Website!</h1>
                </a>
                <p class="project_desc">I created a website for my family, the Madden Clan, to be used as a familial social platform with personalized tools. Through this project I gained a more organized file structure, a better working knowledge of Javascript, and, simply, the meaning of hard work. Over 100 hours were spent in development.</p>
            </div>
            <div class="project_container" id="saferide_app">
                <a href="https://github.com/monty816/SaferidesAndroidApp">
                    <img src="https://tommymadden.com/img/chapman_schmid.jpg" class="project_img" id="saferide_app_img"/>
                    <h1 class="project_title">Saferide App!</h1>
                </a>
                <p class="project_desc">I created an app which has the potential to function as a ride sharing app (similar to Uber). Through this app, I learned about the usefulness of Fragments in Android, the importance of Multithreading for smoothly running apps, and how to use Google Maps API to perform Location services and show maps.</p>
            </div>

            <div class="project_container" id="mobile_database">
                <a href="https://tommymadden.com/personal/spectrum_database_sample_pages.pdf">
                    <img src="https://tommymadden.com/img/networks.png" class="project_img" id="mobile_database_img"/>
                    <h1 class="project_title">Mobile Network Database!</h1>
                </a>
                <p class="project_desc">I created a database of over two thousand mobile networks worldwide. This database included such information as the number of mobile subscribers to a given mobile network operator, the technologies used, and even carrier aggregation between different frequency bands. This database was a marketable product for Mobile Experts and was sold to multiple clients.</p>
            </div>

            <div class="project_container" id="date_ideas_app">
                <a href="https://github.com/monty816/DateIdeas">
                    <img src="https://tommymadden.com/img/rose.jpg" class="project_img" id="date_ideas_app_img"/>
                    <h1 class="project_title">Date Ideas App!</h1>
                </a>
                <p class="project_desc">I created an Android app with the intent of providing date ideas for couples. Through this app, I learned the significance of the MVC Framework, learned how to use a Singleton class as a database, and processed user input in a straightforward way. Uniquely, it provides ideas based on the user's emotional state.</p>
            </div>
            <div class="project_container" id="gridworld_game">
                <a href="https://github.com/monty816/GridworldGame/tree/master/GridworldGame">
                    <img src="https://tommymadden.com/img/dorito.jpeg" class="project_img" id="gridworld_game_img"/>
                    <h1 class="project_title">Gridworld Game!</h1>
                </a>
                <p class="project_desc">Along with my partner Esau Kang, I developed an RPG game featuring a player shaped as a Dorito. Through this game I learned to render images more efficiently, how to work with a partner effectively, and the advantages/disadvantages of various Data Structures. A Hash Map was used to store the usable weapons.</p>
            </div>

            <div class="overall_description">
                I have also developed numerous other applications which are not (yet) available to the public, but these were the main ones I wanted to feature, code and all. In the process of making these programs and games, I learned the practicality of simple techniques in graphic design, programming, and overall UI/UX design. I hope to use my skills and knowledge to continue to code for a better world in years to come.
            </div>

            <div><a name="link-about" class="about_pos"></a></div>
            <div class="spacer"></div>

            <div class="header_container"><span class="header3">About</span></div>


            <p class="about_me">

        All my life, I have been learning to program websites in an interactive, personal way, bringing my creativity as a designer together with my skills as a programmer to develop websites that <i>make sense</i> to people. Using this experience, I hope to develop informative websites that are both professional and fundamentally usable, while still conveying the message that the website is trying to send.

        Websites can be developed for individuals who seek to market themselves (I. E. an online resume, a reel for a filmmaker, or a portfolio), for businesses interested in attracting new customers, and, as always, for anyone hoping to start a personal blog that's different from the standard cookie cutter WIX websites on the market today.

<span style="text-align: center; width: 100%; font-size: 25px">Fill out the contact form below or email me at madde120@mail.chapman.edu for details!</span>
            </p>
            <a name="link-contact" class="contact_pos"></a>
            <div class="spacer"></div>

            <div class="header_container"><span class="header3">Contact</span></div>


            <div id="form_container_container">
                <form method="post" class="form_container" enctype="multipart/form-data">
                    <div id="text_container">
                        <div class="form">Name: <br /><input type="text" name="user_name" placeholder="e. g. John Doe" class="form_input"/></div><br />
                        <div class="form">Email: <br /><input type="email" placeholder="e. g. john@doe.com" name="user_email" class="form_input" /></div><br />
                        <div class="form">Phone Number: <br /><input type="text" placeholder="e. g. (800) 867-5309" name="user_phone_num" class="form_input"/></div><br />
                        <div class="form">Message: <br /><textarea id="msg_box" type="text" placeholder="Enter a message here!" name="message"></textarea></div>

                        <section class="press">
                            <button type="submit">Submit!</button>

                        </section>
                    </div>
                </form>
            </div>

        </div>
</div>

    <?php include("comodo_body_script.php"); ?>


</body>

</html>

<?php unset($_POST['song_name']); unset($_POST['artist_name']); ?>