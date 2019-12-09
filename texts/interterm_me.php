<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 12/31/17
 * Time: 7:38 PM
 */
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];

    $mysqli = new mysqli("server208.web-hosting.com", "tommraed_madde120", "Vfgtyxk37cpa!", "tommraed_interterm");

    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    } else {
        $results = $mysqli->query("SELECT DISTINCT phone_email FROM subscribers");

        while ($row = $results->fetch_assoc()) {
            mail($row['phone_email'], "", $msg, "From: Tommy Madden <me@tommymadden.com>\r\n");
        }


        /* free result set */
        $results->free();
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Text From Website!</title>
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
</head>
<body>
<div id="form_container_container">
    <h1>Send a Text!</h1>
    <form action="" method="get" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form">Message: <br /><textarea id="msg_box" type="text" placeholder="Enter a message here!" name="msg"></textarea></div>

            <section class="press">
                <button type="submit">Submit!</button>

            </section>
        </div>
    </form>
</div>

</body>
</html>