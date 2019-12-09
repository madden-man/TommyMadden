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
    <link href="css/fonts.css" type="text/css" rel="stylesheet" />
    <link href="css/contact.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="all"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css"    />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/form_validation.js" type="text/javascript"></script>
</head>
<body onload="onLoad()">
<br />
<div class="header_container">
    <span class="header3">XML Form:</span><br />
    <a style='margin-left: 10%' href="Instructions.docx">Click here for a Word document of Instructions!</a>
</div>

<div id="form_container_container">
    <form action="files/download_xml.php?nothing" method="post" id="xml_form" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form" id="articleid_prompt">Article ID:<br /><input type="text" name="articleid" placeholder="e. g. MEXP-LPWA-17" class="form_input" <?php if (isset($_POST['curr_articleid'])) {echo 'value="' . $_REQUEST['curr_articleid'] . '"';}?> /></div><br />
            <div id="articleid_info" class="tool_tip" style="display: none;">The Article ID is a unique, concise way to identify the report. At Mobile Experts, this format is expected: MEXP-(4 letter code for article)-(2 digits for year). For example, 'MEXP-LPWA-17' works well.<br /></div>
            <div id="articleid_error" class="msg_error" style="display:none"></div>
            <div class="form" id="dateline_prompt">Date Published: <br /><input type="text" placeholder="e. g. 2017-07-03" name="dateline" class="form_input" <?php if (isset($_POST['curr_articleid'])) {echo 'value="' . $_REQUEST['curr_dateline'] . '"';}?>" /></div><br />
            <div id="dateline_info" class="tool_tip" style="display: none;">This is quite simply the date of publication! Use our handy calendar and it should do all the work for you, but the dates are to be formatted as follows: YYYY-MM-DD, where Y is the four digit year, M is the two digit month, and the two digit day. (Make sure that single digit months and days have a preceding 0, like '02')<br /></div>
            <div id="dateline_error" class="msg_error" style="display:none"></div>
            <div class="form" id="headline_prompt">Headline: <br /><input type="text" placeholder="(title of article)" name="headline" class="form_input" <?php if (isset($_POST['curr_articleid'])) {echo 'value="' . $_REQUEST['curr_headline'] . '"';}?>/></div><br />
            <div id="headline_info" class="tool_tip" style="display: none;">Here you can input the title of the report. Best to keep it relatively short.</div><br />
            <div id="headline_error" class="msg_error" style="display:none"></div>
            <div class="form" id="summary_prompt">Summary: <br /><textarea id="msg_box" type="text" onkeyup="updateCharacterCount(this)" placeholder="(shorter summary)" name="summary"><?php if (isset($_POST['curr_articleid'])) {echo $_REQUEST['curr_summary'] . '"';}?></textarea></div>
            <div id="character_counter" style="display: none">256 characters remaining...</div>
            <div id="summary_info" class="tool_tip" style="display: none;">Here you can input a SHORT summary of what the article is trying to say. No more than 256 characters, please!</div><br />
            <div id="summary_error" class="msg_error" style="display:none"></div>
            <div class="form" id="newsline_prompt">Newsline Text: <br /><textarea id="msg_box" type="text" placeholder="(longer summary)" name="newsline"><?php if (isset($_POST['curr_articleid'])) {echo $_REQUEST['curr_newsline'] . '"';}?></textarea></div>
            <div id="newsline_info" class="tool_tip" style="display: none;">Here you can input a LONGER summary of what the article is trying to say. Technically it's supposed to be the full body text of the article, but that's not reasonable because Mobile Experts reports are more full scale than a real article. You should be able to input as much as you want, though.</div><br />
            <div id="newsline_error" class="msg_error" style="display:none"></div>
            <div class="form" id="byline_prompt">Author: <br /><input type="text" placeholder="e. g. Joe Madden" name="byline" class="form_input" <?php if (isset($_POST['curr_articleid'])) {echo 'value="' . $_REQUEST['curr_byline'] . '"';}?>" /></div><br />
            <div id="byline_info" class="tool_tip" style="display: none;">Here you can enter the author(s) of the article, separated by commas if there is more than one, with the primary author first!</div><br />
            <div id="byline_error" class="msg_error" style="display:none"></div>
            <div class="form" id="source_prompt">Source: <br /><input type="text" placeholder="e. g. Mobile Experts, Inc." name="source" class="form_input" <?php if (isset($_POST['curr_articleid'])) {echo 'value="' . $_REQUEST['curr_source'] . '"';}?>"/></div><br />
            <div id="source_info" class="tool_tip" style="display: none;">Here is where you can input the main source of the report, which is usually "Mobile Experts, Inc.". Only list the primary source of the article, even if other companies contributed to research or details in the report. </div><br />
            <div id="source_error" class="msg_error" style="display:none"></div>
            <div class="form" id="keywords_prompt">Keywords: <br /><textarea id="msg_box" type="text" placeholder="Single words relevant to the report - e. g. IoT Market LPWA 802.15.4g forecast" name="keywords"><?php if (isset($_POST['curr_articleid'])) {echo $_REQUEST['curr_source'] . '"';}?></textarea></div><br />
            <div id="keywords_info" class="tool_tip" style="display: none;">Here is where you can input a few keywords about the article, separated by SPACES, not commas. For example, "Mobile Experts Joe Madden Technologies Low Power Area Frequency Bandwidth" would be one example. Enter as many keywords as necessary (within reasonable limits). </div><br />
            <div id="keywords_error" class="msg_error" style="display:none"></div>
            <?php if (isset($_POST['curr_articleid'])) { ?>
            <div class="form" id="attachment1_prompt">Attachment Already Uploaded!</div><br />
            <?php } else { ?>
            <div class="form" id="attachment1_prompt">Attachment #1: <br /><input type="file" name="attachment1" class="form_input"/></div><br />
            <div id="attachment1_error" class="msg_error" style="display:none"></div>
            <div class="form" id="attachment2_prompt">Attachment #2: <br /><input type="file" name="attachment2" class="form_input"/></div><br />
            <div class="form" id="attachment1_prompt">Attachment #3: <br /><input type="file" name="attachment3" class="form_input"/></div><br />
            <?php } ?>
            <?php if (isset($_POST['curr_articleid'])) { ?>
            <section class="press">
                <button id="fake_update" onclick="validateInput(this)">Update!</button>
            </section>
            <?php } else { ?>
            <section class="press">
                <button id="fake_upload" onclick="validateInput(this)">Upload!</button>
                <button id="fake_download" onclick="validateInput(this)">Download!</button>
            </section>
            <?php } ?>
        </div>
    </form>
</div>

</body>
</html>