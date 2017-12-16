<?php
/**
 * Created by PhpStorm.
 * User: tommy_000
 * Date: 5/17/2016
 * Time: 7:17 PM
 */

if (isset($_FILES['new_image']['name'])) {
    $file_name = str_replace(" ", "_", $_FILES['new_image']['name']);
    $file_size = $_FILES['new_image']['size'];
    $file_tmp = $_FILES['new_image']['tmp_name'];
    move_uploaded_file($file_tmp, "User-Images/" . $file_name);
/*	Image resizing is giving me trouble
    if ($_FILES['new_image']['type'] == "image/jpg") {
		$image = imagecreatefromjpeg($_FILES['new_image']['tmp_name']);
		$new = imagecreatetruecolor(100, 100);
		imagecopyresampled($new, $image, 0, 0, 0, 0, 100, 100, imagesx($image), imagesy($image));
    	// move_uploaded_file($new, "User-Images/" . $file_name);
        imagejpeg($new, "User-Image/" . $file_name);
        file_put_contents("User-Image/" . $file_name, $new);
	} else if ($_FILES['new_image']['type'] == "image/png") {
		$image = imagecreatefrompng($_FILES['new_image']['tmp_name']);
		$new = imagecreatetruecolor(100, 100);
		imagecopyresampled($new, $image, 0, 0, 0, 0, 100, 100, imagesx($image), imagesy($image));
    	move_uploaded_file($new, "User-Images/" . $file_name);
	} else if ($_FILES['new_image']['type'] == "image/gif") {
		$image = imagecreatefromgif($_FILES['new_image']['tmp_name']);
		$new = imagecreatetruecolor(100, 100);
		imagecopyresampled($new, $image, 0, 0, 0, 0, 100, 100, imagesx($image), imagesy($image));
    	move_uploaded_file($new, "User-Images/" . $file_name);
	}*/
}

?>
<head>
    <title>Ignite Repository</title>
    <link rel="stylesheet" href="repository.css" type="text/css" />
</head>
<body>
    <div id="upload_bar">
        <form action="" method="post" enctype="multipart/form-data" style="align-content: center">
            <input type="file" name="new_image" value="Put an image here!" />
            <input type="submit" value="Submit image!" />
        </form>
    </div>
    <?php

    function getDirContents($dir) {
        $results = array();
        $types = array();
        $contents = scandir($dir);

        foreach ($contents as $key => $value) {
            if (!is_dir($dir . DIRECTORY_SEPARATOR . $value) && $value != "." && $value != "..") {
                $results[] = $value;
                $types[] = "file";
            } else if (is_dir($dir . DIRECTORY_SEPARATOR . $value) && $value != "." && $value != "..") {
                $results[] = $value;
                $types[] = "folder";
            }
        }
        return $results;
    }

    $filenames = getDirContents("User-Images/");

    for ($i = 0; $i < count($filenames); ++$i) {
        echo '<div class="file" style="height: 100px; margin-right: 10px; width:100px; float:left; background-image: url(User-Images/' . $filenames[$i] . ')">'. substr($filenames[$i], 0, 10) . '</div>';
    } ?>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <nav class="right_click_menu">
        <ul class="right_click_tasks">
            <li class="right_click_task">
                View
            </li>
            <li class="right_click_task">
                Delete
            </li>
            <li class="right_click_task">
                Download
            </li>
        </ul>
    </nav>
	<script>
(function() {

  "use strict";

    var fileItems = document.querySelectorAll(".file");

    for (var i = 0; i < fileItems.length; ++i) {
        var fileItem = fileItems[i];
        contextMenuListener(fileItem);
    }

    function contextMenuListener(e1) {
        e1.addEventListener("contextmenu"), function (e) {
            document.write(e, e1);
        };
    }
  });

})();
</script>
</body>