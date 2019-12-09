<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 5/17/18
 * Time: 8:51 AM
 */

$ftp_server = "ftp.tommymadden.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to FTP Server!");
$login = ftp_login($ftp_conn, "corning@tommymadden.com", "aqmjfjb3y4XJvKhf");
ftp_chmod($ftp_conn, 0777);


if (isset($_FILES['file_to_upload']['name']))
{
    ftp_put($ftp_conn, $_FILES['file_to_upload']['name'], $_FILES['file_to_upload']['tmp_name'],FTP_BINARY);
}

if (isset($_REQUEST['file_to_remove']))
{
    $file = $_REQUEST['file_to_remove'];

    ftp_delete($ftp_conn, $file);
}

$files = ftp_nlist($ftp_conn, ".");


?>
<html>
<head></head>
<body style="text-align: center; background: white">
<form enctype="multipart/form-data" action="" method="post" style="background: lightcyan; border-radius: 15%; padding: 2%; border: 2px ridge orange; width: 40%; margin: auto;">
    <h1 style="padding-top: 0; margin-top: 0;">File You Wish To Upload: </h1><br><br>
    <input type="file" name="file_to_upload" />
    <input type="submit" value="Upload!" />
</form>

<br>
<br>

<h1>Current Directory Listing for Corning:</h1>

<?php if (sizeof($files) > 3) { ?>
<table style="border: 3px ridge darkorange; background: white; margin: auto;">
    <?php

    foreach ($files as $file) {
        if (substr($file, 0, 1) !== ".")
        {
            echo '<form method="post" action="" id="remove_form_'.$file.'">';
            echo "<input type='hidden' value='".$file."' name='file_to_remove' />";
            echo "<tr>";
            echo "<td>";
            echo "<a href='ftp://tommymadden.com/" . $file . "'>";
            echo $file;
            echo "</a>";
            echo "</td>";
            echo "<td><input type='submit' value='Remove!' name='$file' /></td>";
            echo "</tr>";
            echo "</form>";
        }
    }

    ?>
</table>
<?php } ?>
</body>
</html>