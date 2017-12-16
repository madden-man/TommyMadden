<?php

require("../DB/account_db.php");
require("../DB/guitar_db.php");
include("../account_attributes.php");

if ($_GET['logout'] == "Log out!") {
	unset($_SESSION['currentUser']);
}

if (!isset($_SESSION['currentUser']) && checkAccountInfo($_POST['email'], $_POST['pass'], $account_db)) {
	$_SESSION['currentUser'] = $_POST['email'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="../favicon.ico" type="image/x-icon" rel="icon" />
<title>Guitar Songs!</title>
</head>

<body background="../photos/blue-squares-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<div style="background-color:#FFFFFF; border:double #000000; margin-left:300px; padding:20px 20px 20px 20px">
		<br />
		<?php
		if ($_GET['article_path'] != "") {
			$article_path = $_GET['article_path'];
			$selectionQuery =	"SELECT article_path, article_title FROM articles
								WHERE article_path = '$article_path'";
			$result = $politics_db->query($selectionQuery)->fetch_row();
			$song_path = "http://maddenclan.net/guitar/txt/" . $result[0];
			$file = fopen($song_path, "r") or die("Unable to open file!");
			$title = $result[1];
			echo "<p align='center' style='font-family:Georgia, Times New Roman; font-size:18px'>" . $title . "</p>";
			echo "<pre><b>";
			$line = " ";
			while ($line != "") {
				$line = fgets($file);
				echo $line;
			}
			echo "</b></pre>";
			fclose($file);
		}
		
		?>
		</div>
		<p align="center"><a href="http://maddenclan.net/politics/article_submission.php" id="article-submission-link"></a></p>
	</div>
</body>
</html>
