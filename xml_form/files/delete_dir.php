<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 3/15/18
 * Time: 9:02 PM
 */

if (isset($_REQUEST['dir_name']))
{

    $dir_name = $_REQUEST['dir_name'];

    $ftp_server = "ftp.tommymadden.com";
    $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to FTP Server!");
    $login = ftp_login($ftp_conn, "ericsson@tommymadden.com", "(=V#6gbx:+5}4GYc");
    ftp_chmod($ftp_conn, 0777, '.');

    recurseRmdir($dir_name, $ftp_conn);

    ftp_close($ftp_conn);

    header('Location: https://tommymadden.com/xml_form/files/index.php?deleted=true');
}

function recurseRmdir($dir, $ftp_conn) {
    $files = [];

    if (file_exists('./' . $dir))
    {
        try {
            $di = new RecursiveDirectoryIterator('./' . $dir . '/');

            foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
                if ($di->getSubPathname() === "error_log" || $di->getSubPathname() === 'index.php' || $di->getSubPathname() === '.' || $di->getSubPathname() === '..' || $di->getSubPathname() === '.xml' || substr($filename, strlen($filename) - 2, 1) === '.') {
                    continue;
                } else if ($filename[strlen($filename) - 1] === '.') {
                    unlink($file);
                } else {
                    unlink($file);

                    $display_file = substr($file, strrpos($file, '/') + 1);

                    ftp_delete($ftp_conn, $display_file);
                }
            }
        }
        catch (Exception $exception)
        {
            echo $exception->getLine();
        }
        rmdir('./' . $dir);
    }
}