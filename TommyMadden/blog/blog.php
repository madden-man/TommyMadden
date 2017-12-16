<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 4/4/2017
 * Time: 9:13 PM
 */

session_set_cookie_params(3600);
session_start();

include("navbar.php");

?>

<head>
    <title>Tommy's Thoughts</title>
    <link href="https://tommymadden.com/blog/css/post.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="post_container">
        <div class="post">
            <p class="post_title">I wonder what things were like before light ever existed.</p>

            <img src="img/light-dark1.jpg" class="horizontal"/>

            If we couldn't see things for what they were, would they still exist? Would we still go about our days in our humble toil, like moles in a cave with no knowledge of what sight would be even if we had it?

            This is a question philosophers have pondered for centuries. People go back and forth, and use more and more advanced vocabulary to prove their points. Well, here I am to tell you in plain terms - Yes.

            Yes, a tree makes a sound when it falls in the middle of the forest with no one around. Yes, the stars exist even if we can never reach out and touch them. And YES, things have existed before you were born and quite possibly will continue to exist when you are long gone.

            Sometimes, all we need is to say yes. Even when we can't explain that yes.

            <img src="img/tree.jpg" class="horizontal"/>

            When I was very young, I had no idea who God was. I assumed that faith was something for old wise men and not for young boys like me. I figured that God only knew people that went to church and read their Bible every day. But that was because I hadn't said yes yet.

            If you're reading this and you're not Christian, I'm not going to convince you that Jesus is the answer. I'm not going to lay out all the evidence and point to it and tell you to believe, because that's not what belief is. Belief is saying yes, it's taking the leap when no one tells you what's on the other side.

            Through this blog, I hope to explain a little bit about the ways I've said yes recently. This isn't for spiritual people, it's not for the ungodly, it's not for rednecks or Christian rappers or old people. It's for me.

        </div>
    </div>
    <?php include("post_list.php"); ?>
</body>