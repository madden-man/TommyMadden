<?php
/**
 * Created by PhpStorm.
 * User: monty
 * Date: 4/4/2017
 * Time: 9:17 PM
 */


$files = [];

if (file_exists('../photos_of_me')) {
    try {
        $di = new RecursiveDirectoryIterator('../photos_of_me');

        foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
            if ($di->getSubPathname() === "error_log" || $di->getSubPathname() === 'index.php' || $di->getSubPathname() === '.' || $di->getSubPathname() === '..' || $di->getSubPathname() === '.xml' || substr($filename, strlen($filename) - 2, 1) === '.') {
                continue;
            } else if ($filename[strlen($filename) - 1] === '.') {
                // Directory
            } else {
                // File

                $display_file = substr($file, strrpos($file, '/') + 1);

                array_push($files, $display_file);
            }
        }
    } catch (Exception $exception) {
        echo $exception->getLine();
    }

    $current_img_idx = rand(0, sizeof($files) - 1);
}
?>
<head>
    <link type="text/css" href="https://tommymadden.com/blog/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="https://tommymadden.com/blog/css/universals.css" rel="stylesheet" />
    <link href="https://tommymadden.com/blog/css/index.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        #bottom_bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
    <script type="text/javascript">
        function setSpotifyLocation() {
            var bottom_bar = document.getElementById("bottom_bar");
            bottom_bar.style.top = (window.innerHeight - 80) + "px";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="user-scalable = yes, max-width=1300">
    <!--meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" /-->
    <meta name="Keywords" content="website, christian, love, faith, people, man, program, service, easy, convenient, helpful, programming, development" />
    <meta name="Description" content="Tommy Madden is a Christian Web developer who develops websites for people through an elaborate and precise design process, giving each customer exactly what he/she needs. This service is performed in the hopes that Tommy would become a more experienced programmer and ultimately that he would benefit the world with his services." />
    <?php include("../analyticstracking.php"); ?>

    <link rel="shortcut icon" href="https://tommymadden.com/favicon.ico" type="image/x-icon">
</head>

<body>
<div id="nav_container">
    <a href="https://tommymadden.com/blog/blog.php"><div class='nav_title' id="nav_blog"><b>Air</b></div></a>
    <a href="https://tommymadden.com/blog/sermons.php"><div class='nav_title' id="nav_sermons"><b>Water</b></div></a>
    <div style="display: none" id="current_img"><?php echo $files[$current_img_idx]; ?></div>
    <a href="https://tommymadden.com/blog/index.php"><div class='nav_title' id="nav_home" onmouseover="this.style.background = 'white'" onmouseleave="var myImg = document.getElementById('current_img').innerHTML; this.style.background = 'url(../photos_of_me/' + myImg + ') center center'; this.style.backgroundSize = 'cover';" style="background: url(../photos_of_me/<?php echo $files[$current_img_idx]; ?>) center center; background-size: cover;"><b>Home</b></div></a>
    <a href="https://tommymadden.com/blog/projects.php"><div class='nav_title' id="nav_projects"><b>Earth</b></div></a>
    <a href="https://tommymadden.com/blog/poetry.php"><div class='nav_title' id="nav_poetry"><b>Fire</b></div></a>
</div>

</body>

<script>
function clearHome(context)
{
    $(context).css('background: white');
}
</script>