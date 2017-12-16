<?php
session_start();

require_once("../DB/account_db.php");
require_once("../DB/thingoftheday_db.php");
include("../account_attributes.php");
include("../DB/guitar_db.php");

if ($_GET['logout'] == "Log out!") {
	unset($_SESSION['currentUser']);
}

if (!isset($_SESSION['currentUser']) && checkAccountInfo($_POST['email'], $_POST['pass'], $account_db)) {
	$_SESSION['currentUser'] = $_POST['email'];
}

if (isset($_FILES['new_song'])) {
	$file_name = $_FILES['new_song']['name'];
	$file_size = $_FILES['new_song']['size'];
	$file_tmp = $_FILES['new_song']['tmp_name'];
	$song_name = mysqli_real_escape_string($guitar_db, $_POST['song_name']);
	$errors = array();
	if (end(explode(".", $file_name)) != "txt") {
		$errors = "The file must end with '.txt'!";
	} if ($file_size > 1000000000) {
		$errors = "The file is too big!";
	} if (!isset($_POST['song_author'])) {
		$errors = "You must add the song author!";
	} if (!isset($_POST['song_name'])) {
		$errors = "You must add the song name!";
	}
	if (empty($errors) == true) {
		move_uploaded_file($file_tmp, "txt/" . $file_name);
		if ($_POST['genre']) {
			$genre = mysqli_real_escape_string($guitar_db, $_POST['genre']);
			$author = mysqli_real_escape_string($guitar_db, $_POST['song_author']);
			$songInsertionQuery =	"INSERT INTO songs
										(song_name, genre, song_author, song_path)
									VALUES
										('$song_name', '$genre', '$author', '$file_name')";
			$result = $guitar_db->query($songInsertionQuery);
			if ($result) {
				$success = "yes";
			} else {
				$success = "no";
			}
		} else {
			$author = mysqli_real_escape_string($guitar_db, $_POST['song_author']);
			$songInsertionQuery =	"INSERT INTO songs
										(song_name, song_author, song_path)
									VALUES
										('$song_name', '$author', '$file_name')";
			$result = $guitar_db->query($songInsertionQuery);
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
<title>Submit a Song!</title>
</head>

<body background="../photos/magenta-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<br />
		<div>
			<?php if ($success == "yes") { ?>
			<div id="success">Your song was successfully submitted!</div>
			<?php } else if (success == "no") { ?>
			<div id="failure">Your song was not submitted...</div>
			<?php } if (!empty($errors)) { ?>
			<div id="registration_error">Looks like there\'s something wrong with the way you filled out that form. :(<br /><ul>
			<?php foreach ($errorArray as $error => $errorMessage) { ?>
				<li><?php echo $errorMessage; ?></li>
			<?php } 
			} ?>
			</ul></div>
			<form action="" method="post" enctype="multipart/form-data">
				Upload a text file containing a song to add it to our list! It should end with &quot;.txt&quot;. <input type="file" name="new_song" /><br /><br />		
				Genre: <input type="text" name="genre" /><br /><br />
				Song Name: <input type="text" name="song_name" /><br /><br />
				Author: <input type="text" name="song_author" /><br /><br />
				<input type="submit" value="Upload a file!" />
			</form>
		</div>
	</div>
</body>
</html>
