<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 5/11/2017
 * Time: 12:08 AM
 */

include("navbar.php");

?>
<head>
    <link href="css/lists.css" rel="stylesheet" type="text/css" />
</head>

<div class="label_container">
    <div class="label" id="projects_label">
        My Projects
    </div>
</div>

<div class="item">

    <div class="link">
        <h1>Worship Slides Manager</h1>
        As part of Cru (Campus Crusade for Christ), I was in charge
        of making worship slides for a full year. After months and
        months of making PowerPoint slides that I knew could be auto-
        mated, I decided to write software that would get the lyrics
        of a particular song from azlyrics.com and present them against
        a black background. You can see my initial product here:<br><br>

        <a href="https://tommymadden.com/slides/">Initial Product</a><br><br>

        This didn't seem to be enough, though. I wanted anyone to be
        able to use the site and know what songs would actually be
        available before the day of. So I made a database on MYSQL
        (you don't need to know what that is, it's okay) and made
        it possible to save what songs you would want to access,
        showing you whether they'd be available right then and there.<br><br>

        <a href="https://tommymadden.com/slides/creator.php">Updated Version</a><br><br>

        I made some other minor changes as well. On the slides, I made
        it so that by clicking the backslash '\' key, you could click on
        the text and edit it when undesired. This helped because it meant
        I could change details before/during the worship. Also, I made it
        possible to upload the lyrics in text form if they weren't available
        on the azlyrics.com site, and put that in a separate page too:<br><br>

        <a href="https://tommymadden.com/slides/custom_request.php">Custom Version</a><br>
        (The third one is sloppy because I just finished it!)
    </div>

    <div class="link">
        <h1>Online Bible</h1>
        So I was bored one day, and thought it would be cool if my website
        had a Bible on it. It seemed fitting, I guess, since it's basically
        the best book ever and I know there's websites that allow you to access
        it for free. So I did some digging, and found one website that allowed
        me to get an API key and get their content for free. So I made this
        page that shows you a random chapter of the Bible:<br><br>

        <a href="https://tommymadden.com/bible/random_chap.php">Random Chapter</a><br><br>

        Then, after some hard work, I was able to develop a product that I think
        satisfies the basic requirements of a Bible - it has all the books of
        the Bible lined out in buttons at the top of the page, it has arrows to
        allow you to go from one chapter to the next, and it provides the content
        in an organized manner. It looks better than a few of the other projects
        I've worked on, at least! Here it is:<br><br>

        <a href="https://tommymadden.com/bible">Online Bible</a><br>
        (It's kinda clunky and takes a while to load a new book if you click on it!)
    </div>

    <div class="link">
        <h1>TrueVine: Get Connected!</h1>
        So I thought it would be cool to have a website that shows you what churches
        there are in your area. After looking around, I found out Google Places API
        (for Javascript) is actually free for a certain amount of time. After
        signing up for an API Key, I 'connected' (lol) and was able to have it show
        churches near the area of Orange, where I live. Then, I downloaded a funny
        little icon of a church to show where those spots were. <br><br>

        I also developed a bunch of random other pages because I thought it could
        be like a one-stop shop for getting plugged in (finding out about the churches
        below, etc.) but didn't end up populating the other pages, so they're just
        placeholders. The top bar looks pretty, though.<br><br>

        <a href="https://tommymadden.com/truevine/">TrueVine</a><br>
        (If you click on the icons it shows you the name of the church, too!)
    </div>

    <div class="link">
        <h1>Mass Texting</h1>
        If you know me, you know I like to put on a lot of events. Random events,
        structured events, informal events, musical events. It's kind of in my
        wheel house. But something else about me is, I like to be really personal
        about inviting people to my events. It's too impersonal for me to just
        make an event on Facebook and expect people to find it - I have to text
        people and see if they're really interested!<br><br>

        So I decided to make a database of phone numbers, and text them from my
        website, so I didn't have to individually text everyone, but they could
        text back if they had any questions or anything! It was a funny project
        to undertake, but I did it. You can send a text to anyone in the world
        from here:<br><br>

        <a href="https://tommymadden.com/texts">Send a Text!</a><br><br>

        Then, I had a bunch of people sign up with their name and phone number
        on a form on my site, and over the course of Interterm (a fun one-month
        semester at Chapman), I texted people about events through my website!
        You can see the form here:<br><br>

        <a href="https://tommymadden.com/texts/interterm.php">Sign Up for Texts!</a><br>
        (But don't really haha)
    </div>
</div>