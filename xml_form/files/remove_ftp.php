<?php

if (isset($_REQUEST['directory']))
{
    $ftp_server = "ftp.tommymadden.com";
    $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to FTP Server!");
    $login = ftp_login($ftp_conn, "ericsson@tommymadden.com", "(=V#6gbx:+5}4GYc");
    ftp_chmod($ftp_conn, 0777, ".");

    $files = [];

    $directory = $_REQUEST['directory'];

    if (file_exists('./' . $directory)) {
        try {
            $di = new RecursiveDirectoryIterator('./' . $directory . '/');

            foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
                if ($di->getSubPathname() === "error_log" || $di->getSubPathname() === 'index.php' || $di->getSubPathname() === '.' || $di->getSubPathname() === '..' || $di->getSubPathname() === '.xml' || substr($filename, strlen($filename) - 2, 1) === '.') {
                    continue;
                } else if ($filename[strlen($filename) - 1] === '.') {
                    // Directory
                } else {
                    array_push($files, $file);
                }
            }
        } catch (Exception $exception) {
            echo $exception->getLine();
        }


        foreach ($files as $file) {
            $display_file = substr($file, strrpos($file, "/") + 1);

            if (ftp_delete($ftp_conn, $display_file))
            {
                // Test
            }
            else
            {
                die("Problem with deleting file!" . $display_file);
            }
        }
    }

    ftp_close($ftp_conn);
    echo "success";
}
?>
