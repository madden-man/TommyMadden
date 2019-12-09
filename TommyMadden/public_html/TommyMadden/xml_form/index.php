<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 2/23/18
 * Time: 7:49 PM
 */

?>

<html>
<head>
    <title>XML Form</title>
    <link href="../"
</head>
<body>
<div id="form_container_container">
    <form method="post" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form">Article ID: <br /><input type="text" name="articleid" placeholder="e. g. John Doe" class="form_input"/></div><br />
            <div class="form">Date Published: <br /><input type="text" placeholder="e. g. 2017-07-03" name="dateline" class="form_input" /></div><br />
            <div class="form">Headline: <br /><input type="text" placeholder="(title of article)" name="headline" class="form_input"/></div><br />
            <div class="form">Summary: <br /><textarea id="msg_box" type="text" placeholder="(shorter summary)" name="summary"></textarea></div>
            <div class="form">Newsline Text: <br /><textarea id="msg_box" type="text" placeholder="(longer summary)" name="newslinetext"></textarea></div>
            <div class="form">Author: <br /><input type="text" placeholder="e. g. Joe Madden" name="dateline" class="form_input" /></div><br />
            <div class="form">Source: <br /><input type="text" placeholder="e. g. Mobile Experts, Inc." name="headline" class="form_input"/></div><br />
            <div class="form">Keywords: <br /><textarea id="msg_box" type="text" placeholder="e. g. IoT Market LPWA 802.15.4g forecast" name="keywords"></textarea></div><br />
            <div class="form">Attachment: <br /><input type="file" name="attachment" class="form_input"/></div><br />

            <section class="press">
                <button type="submit">Submit!</button>

            </section>
        </div>
    </form>
</div>

</body>
</html>
