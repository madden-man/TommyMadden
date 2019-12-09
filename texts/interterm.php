<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 12/31/17
 * Time: 7:38 PM
 */



?>


<!DOCTYPE html>
<html>
<head>
    <title>Text From Website!</title>
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(function () {

            $('form').on('submit', function (e) {

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: 'submit_number.php',
                    data: $('form').serialize(),
                    success: function (msg) {
                        if (msg === "Didn't work!") {
                            failure();
                        } else {
                            success();
                        }
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

        function failure() {
            $('.error').fadeIn(200).show();
            $('.form_successful').fadeOut(200).hide();

            setTimeout(function() {
                $('.error').fadeOut(1000).show();

            }, 2000);
        }
    </script>
</head>
<body>
<div class="form_successful">Your number has been received! You will receive a confirmation shortly.</div>
<div class="error">Your number was not received. We may be having technical difficulties.</div>
<div id="form_container_container">
    <h1>Get Notifications for Events Here!</h1>
    <form method="post" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form">Name: <br /><input type="text" placeholder="e. g. Tommy Madden" name="name" class="form_input"/></div><br />
            <div class="form">Phone Number: <br /><input type="text" placeholder="e. g. (800) 867-5309" name="num" class="form_input"/></div>

            <section class="press">
                <button type="submit">Submit!</button>

            </section>
        </div>
    </form>
</div>

</body>
</html>