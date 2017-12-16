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

<body background="../photos/magenta-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<br />
		<div id="table-of-contents">
			<table cellspacing="10">
				<form action="display_song.php" method="get">
					<?php 
					$selectionQuery = 	"Select * FROM songs
										ORDER BY song_name";
					$songs = $guitar_db->query($selectionQuery);
					for ($i = 0; $i < (mysqli_num_rows($songs) / 5) + 2; $i++) { ?>
						<tr>
				<?php 	$j = 0;
						while ($j < 4 && ($song = $songs->fetch_row()) != null) {
							$j++;
							$songname = $song[1];
							$songpath = $song[0]; 
							$song_author = $song[2]; ?>
							<td width="260">
								<input type="submit" name="song_name" value="<?php echo $songname; ?>" /> by <?php echo $song_author; ?>
							</td>
				<?php	} ?>
						</tr>
			  <?php } ?>
				</form>
			</table>
		</div>
		<p align="center"><a href="http://maddenclan.net/guitar/song_submission.php" id="song-submission-link"></a></p>
	</div>
</body>
</html>