<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 5/23/2017
 * Time: 2:08 PM

 *
 */

include("top_bar.php");
$wasSuccessful = false;
if (isset($_POST['user_name']) && $_POST['user_name'] != "") {
    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_users");
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone_num = $_POST['user_phone_num'];
    $message = $_POST['message'];
    $wasSuccessful = $mysqli->query("INSERT INTO contact_info (name, email, phone, website_description) VALUES ('" . $user_name . "', '" . $user_email . "', '" . $user_phone_num . "', '" . $message . "')");
    // the message
    $msg = "Name: " . $user_name . "\n";
    $msg .= "Email: " . $user_email . "\n";
    $msg .= "Phone Number: " . $user_phone_num . "\n";
    $msg .= "Message: " . $message . "\n";

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

// send email
  //  mail("madde120@mail.chapman.edu","Someone Wants a Website!",$msg);
}

?>

<head>
    <link href="css/contact.css" rel="stylesheet" type="text/css" />
</head>
<?php if ($wasSuccessful) { ?>
    <script type="text/javascript">
        function doWhatsNecessary() {
            setTimeout(function() {
                var success_form = document.getElementById("form_successful");
                success_form.style.opacity = '0';
                setTimeout(function(){
                    success_form.parentNode.removeChild(success_form);
                    }, 800);
            }, 4000);
        }
    </script>
    <div id="form_successful">Your message has been received! You will be contacted shortly.</div>
    <script type="text/javascript">
        doWhatsNecessary();
        var success_form = document.getElementById("form_successful");
        success_form.style.opacity = 1;
    </script>
<?php } ?>
<div id="info_container">
    <div id="info">Hello there! As you may have guessed, my name is Tommy Madden.

        I am a programmer studying Computer Science at Chapman University.

        Ever since I was twelve years old, I have been learning to program websites in an interactive, personal way, bringing my creativity as a designer together with my skills as a programmer to make websites that <i>make sense</i> to people. Using this experience, I hope to develop informative websites that are both professional and fundamentally usable, while still conveying the message that the website is trying to send.

        Websites can be developed for individuals who seek to market themselves (I. E. an online resume, a reel for a filmmaker, or a portfolio), for businesses interested in attracting new customers, and, as always, for anyone hoping to start a personal blog that's different from the standard cookie cutter WIX websites on the market today.

        If that sounds like you, fill out the form below for more information!
    </div>
</div>
<div id="form_container_container">
    <form action="" method="post" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form">Name: <br /><input type="text" name="user_name"/></div>
            <div class="form">Email: <br /><input type="email" name="user_email" /></div>
            <div class="form" id="last_form">Phone Number (xxx-xxx-xxxx): <br /><input type="text" name="user_phone_num"/></div><br />
            <div class="form">Message: <br /><textarea style="width: 280px; height: 200px; margin-right: 10px" type="text" name="message"></textarea></div>

            <button type="submit">Submit!</button>
        </div>
    </form>
</div>