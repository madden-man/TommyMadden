<?php
session_start();

require_once("../DB/account_db.php");
require_once("../DB/thingoftheday_db.php");
include("../account_attributes.php");
include("../DB/guitar_db.php");
require("../DB/politics_db.php");

if ($_GET['logout'] == "Log out!") {
	unset($_SESSION['currentUser']);
}

if (!isset($_SESSION['currentUser']) && checkAccountInfo($_POST['email'], $_POST['pass'], $account_db)) {
	$_SESSION['currentUser'] = $_POST['email'];
}

if (isset($_FILES['new_article'])) {
	$file_name = $_FILES['new_article']['name'];
	$file_size = $_FILES['new_article']['size'];
	$file_tmp = $_FILES['new_article']['tmp_name'];
	$article_title = mysqli_real_escape_string($politics_db, $_POST['title']);
	$errors = array();
	if (end(explode(".", $file_name)) != "txt") {
		$errors = "The file must end with '.txt'!";
	} if ($file_size > 1000000000) {
		$errors = "The file is too big!";
	} if (!isset($_POST['author'])) {
		$errors = "You must add the article's writer!";
	} if (!isset($_POST['title'])) {
		$errors = "You must add the article name!";
	} 
	
	if (empty($errors) == true) {
		if (isset($_POST['subject'])) {
			move_uploaded_file($file_tmp, "txt/" . $file_name);
			$article_author = mysqli_real_escape_string($politics_db, $_POST['author']);
			$article_subject = mysqli_real_escape_string($politics_db, $_POST['subject']);
			$songInsertionQuery =	"INSERT INTO articles
										(article_path, article_title, article_author, article_subject)
									VALUES
										('$file_name', '$article_title', '$article_author', '$article_subject')";
			$result = $politics_db->query($songInsertionQuery);
			if ($result) {
				$success = "yes";
			} else {
				$success = "no";
			}
		} else {
			move_uploaded_file($file_tmp, "txt/" . $file_name);
			$article_author = mysqli_real_escape_string($politics_db, $_POST['author']);
			$songInsertionQuery =	"INSERT INTO articles
										(article_path, article_title, article_author)
									VALUES
										('$file_name', '$article_title', '$article_author')";
			$result = $politics_db->query($songInsertionQuery);
			if ($result) {
				$success = "yes";
			} else {
				$success = "no";
			}
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="../favicon.ico" type="image/x-icon" rel="icon" />
<title>Submit an Article!</title>
</head>

<body background="../photos/blue-squares-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<br />
		<div>
			<?php if ($success == "yes") { ?>
			<div id="success">Your article was successfully submitted!</div>
			<?php } else if (success == "no") { ?>
			<div id="failure">Your article was not submitted...</div>
			<?php } if (!empty($errors)) { ?>
			<div id="registration_error">Looks like there's something wrong with the way you filled out that form. :(<br /><ul>
			<?php foreach ($errorArray as $error => $errorMessage) { ?>
				<li><?php echo $errorMessage; ?></li>
			<?php } 
			} ?>
			</ul></div>
			<div style="background-color:#FFFFFF">
				<form action="" method="post" enctype="multipart/form-data">
					Upload a text file containing a political argument/article to add it to our list! It should end with &quot;.txt&quot;.<br /> <input type="file" name="new_article" /><br /><br />		
					Title: <input type="text" name="title" /><br /><br />
					Author: <input type="text" name="author" /><br /><br />
					Subject: <select name="subject">
						<option>Capital Punishment</option>
					</select><br /><br />
					<input type="submit" value="Upload a file!" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
