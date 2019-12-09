<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 3/15/18
 * Time: 9:16 PM
 */

if (isset($_FILES['fileToUpload']))
{
    $current_file = $_FILES['fileToUpload']['tmp_name'];

    $dir = $_REQUEST['dir'];

    $upload_file = './' . $articleid . '/' . $_FILES['fileToUpload']['name'];


}

function uploadToDir($dir) {
    $files = [];

    if (file_exists('./' . $dir))
    {
        try {
            $di = new RecursiveDirectoryIterator('./' . $dir . '/');

            foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
                if ($di->getSubPathname() === "error_log" || $di->getSubPathname() === 'index.php' || $di->getSubPathname() === '.' || $di->getSubPathname() === '..' || $di->getSubPathname() === '.xml' || substr($filename, strlen($filename) - 2, 1) === '.') {
                    continue;
                } else if ($filename[strlen($filename) - 1] === '.') {
                    // Directory
                } else {
                    $file = substr($file, strpos($file, 'files/') + 6);
                    echo $file . '<br />';
                    $slash = strrpos($file, '/');
                    $str = substr($file, 0, $slash);
                    $display_file = substr($file, $slash + 1);
                    echo $display_file . '<br />';
                    echo $str . '<br />';
                    // Only print it if article ID's match
                    if ($dir === $str) {
                        unlink($file);
                        echo 'got here';
                    }
                }
            }
        }
        catch (Exception $exception)
        {
            echo $exception->getLine();
        }

        foreach ($files as $file)
        {
            // Move other file out of the way
            move_uploaded_file('./' . $file, './' . basename($file));
            $hadToMoveFile = true;
        }
    }
}