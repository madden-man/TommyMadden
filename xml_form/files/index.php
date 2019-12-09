<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 3/14/18
 * Time: 2:14 PM
 */



$ftp_server = "ftp.tommymadden.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to FTP Server!");
$login = ftp_login($ftp_conn, "ericsson@tommymadden.com", "(=V#6gbx:+5}4GYc");
ftp_chmod($ftp_conn, 0777);

$current_dirs = array();

$files = ftp_nlist($ftp_conn, ".");

foreach ($files as $file) {
    if (strpos($file, ".xml")) {
        array_push($current_dirs, substr($file, 0, strpos($file, ".xml")));
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>File Manager</title>
    <link rel="stylesheet" type="text/css" media="all"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css"    />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="../css/file_controller.css" type="text/css" rel="stylesheet" />
    <script src="../js/file_controller.js" type="text/javascript" rel="script"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
<div id="msg_success"></div>
<div id="msg_progress"></div>
<div id="msg_error"></div>
<?php

$directories = [];
$files = [];
try {
    $di = new RecursiveDirectoryIterator('.');

    foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
        if ($di->getSubPathname() === "error_log" || $di->getSubPathname() === 'index.php' || $di->getSubPathname() === '.' || $di->getSubPathname() === '..' || $di->getSubPathname() === '.xml' || substr($filename, strlen($filename) - 2, 1) === '.') {
            continue;
        } else if ($filename[strlen($filename) - 1] === '.') {
            array_push($directories, $di->getSubPathname());
        } else {
            array_push($files, $filename);
        }
    }
}
catch (Exception $exception)
{
    echo $exception->getLine();
}
?>
<table id='file_displayer'>

<thead>
    <tr>
        <td>XML File Manager!</td>
    </tr>
</thead>

<?php

foreach ($directories as $directory)
{
    $is_current_dir = false;
    for ($i = 0; $i < sizeof($current_dirs); ++$i)
    {
        if ($current_dirs[$i] === $directory) {
            $is_current_dir = true;
        }
    }

    if ($is_current_dir === true) {
        echo "<tbody class='current directory' id='" . $directory . "'>\n";
    }
    else
    {
        echo "<tbody class='directory' id='" . $directory . "'>\n";
    }
    echo "<tr align='justify'>\n";
    echo "<td colspan='2'>" . $directory;
    echo "<a href='https://tommymadden.com/xml_form/files/delete_dir.php?dir_name=".$directory."'><img src='../img/ic_close_black_24dp/web/ic_close_black_24dp_1x.png' class='btn_remove' /></a>";

    echo "</td>\n";
    echo "</tr>\n";
    foreach ($files as $file)
    {

        $begin = strpos($file, '/') + 1;
        $end = strrpos($file, '/');
        $str = substr($file, $begin, $end - $begin);
        $display_file = substr($file, $begin);
        // Only print it if article ID's match
        if ($directory === $str)
        {
            echo "<tr id='" . $display_file . "'>\n";
            echo "<td style='padding-right: 20px;'><a href='https://tommymadden.com/xml_form/files" . substr($file, strpos($file, '/')) . "'>" . $display_file . "</a></td>\n";
            echo "<td>\n";
            echo "<a class='btn_view' href='https://tommymadden.com/xml_form/files" . substr($file, strpos($file, '/')) . "'></a>\n";
            echo "<button class='btn_edit' onclick='editFile(this)'></button>\n";
       //     echo "<button class='btn_upload' onclick='uploadFile(this)'></button>\n";
            echo "</td>\n";
            echo "</tr>\n";
        }

    }
    if ($is_current_dir === true) {
        echo "<tr><td colspan='2' style='height: 30px;'>";
        echo "This is currently available for Ericsson! Remove here: <div class='btn_sub' onclick='removeFromFTP(this)'></div></td></tr>\n";
    }
    else
    {
        echo "<tr><td colspan='2' style='height: 30px;'>";
        echo "This is not available for Ericsson. Add here: <div class='btn_add' onclick='addToFTP(this)'></div></td></tr>\n";
    }
    echo "</tbody>\n";
}

?>
</table>

<form action='../index.php' method="post" style="display: none" id="edit_form">
    <label>bs</label><input type="text" name="curr_articleid" />
    <label>bs</label><input type="text" name="curr_dateline" />
    <label>bs</label><input type="text" name="curr_headline" />
    <label>bs</label><input type="text" name="curr_summary" />
    <label>bs</label><input type="text" name="curr_newsline" />
    <label>bs</label><input type="text" name="curr_byline" />
    <label>bs</label><input type="text" name="curr_source" />
    <label>bs</label><input type="text" name="curr_keywords" />
    <label>bs</label><input type="text" name="curr_attachment" />
    <input type="submit" value="edit" />
</form>

<form action="delete_dir.php" method="POST" style="display: none;" id="delete_form">
    <input type="text" name="dir_name" />
    <input type="submit" value="delete" id="delete_form_submitter" />
</form>

<?php

if (isset($_REQUEST['deleted']) && $_REQUEST['deleted'] === 'true')
{
    echo "<script>showSuccess('Success! Your files were deleted, here and on the FTP server.')</script>";
}

?>
</body>
</html>
