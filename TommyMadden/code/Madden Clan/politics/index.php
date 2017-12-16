<?php

require("../DB/account_db.php");
require("../DB/politics_db.php");
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
<title>Political Articles!</title>
</head>

<body background="../photos/blue-squares-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<br />
		<div id="table-of-contents">
			<table cellspacing="10">
				<tr>
					<td colspan="4" bgcolor="#FFFFFF" style="text-align:center; font-size:18px">
						<p style="margin:10px 20px 10px 20px">For my Religion and Politics class, I have compiled a group of articles revolving around the controversy over the legality and the morality of capital punishment in the United States. These articles will have a variety of opinions, and each one will show a different perspective. <br /><br />The subsections for capital punishment are displayed below:</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align="center"><a href="deterrence.php" style="background:url(../photos/deterrence.png); border-radius:5px; display:block; height:113px; width:275px"></a></p>
					</td>
					<td>
						<p align="center"><a href="exoneration.php" style="background:url(../photos/exoneration.png); border-radius:5px; display:block; height:113px; width:275px"></a></p>
					</td>	
					<td>
						<p align="center"><a href="minorities.php" style="background:url(../photos/minorities.png); border-radius:5px; display:block; height:113px; width:275px"></a></p>
					</td>
				</tr>
				<form action="display_song.php" method="get">
					<?php /*
					$selectionQuery = 	"Select * FROM articles
										ORDER BY article_title";
					$articles = $politics_db->query($selectionQuery);
					for ($i = 0; $i < (mysqli_num_rows($articles) / 5) + 2; $i++) { ?>
						<tr>
				<?php 	$j = 0;
						while ($j < 3 && $articles != false && ($article = $articles->fetch_row()) != null) {
							$j++;
							$article_title = $song[1];
							$article_path = $song[0]; 
							$article_author = $song[2]; ?>
							<td width="350" bgcolor="#FFFFFF" bordercolor="#000000">
								<input type="submit" name="song_name" value="<?php echo $article_title; ?>" /> by <?php echo $article_author; ?>
							</td>
				<?php	} ?>
						</tr>
			  <?php } */?>
				</form>
			</table>
		</div>
		<p align="center"><a href="http://maddenclan.net/politics/article_submission.php" id="article-submission-link"></a></p>
	</div>
</body>
</html>