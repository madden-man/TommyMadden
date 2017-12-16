<?php

session_start();

require("DB/account_db.php");
include("account_attributes.php");
require("DB/posts_db.php");

if ($_GET['logout'] == "Log out!") {
	unset($_SESSION['currentUser']);
}

if (!isset($_SESSION['currentUser']) && checkAccountInfo($_POST['email'], $_POST['pass'], $account_db)) {
	$_SESSION['currentUser'] = $_POST['email'];
}

if ($_GET['comment'] != "") {
	$idForPost = $_GET['postID'];
	$comment = mysqli_real_escape_string($posts_db, $_GET['comment']);
	$user = $_SESSION['currentUser'];
	$insertionQuery =	"INSERT INTO comments
							(post_id, comment, email, dateTimeCommented)
						VALUES
							('$idForPost', '$comment', '$user', NOW())";
	$result = $posts_db->query($insertionQuery);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="favicon.ico" type="image/x-icon" rel="icon" />
<title>Madden Clan</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
	var welcomeToSite = function() {
		alert("Welcome to the Madden Clan's Website! Whoever you are, if you found this website, you are a part of the Madden family. Click 'Register' at the top right to make it official!!");
	}
</script>
</head>

<body background="photos/sunset-background.png" <?php if (!isset($_SESSION['currentUser'])) { ?> onload="welcomeToSite()" <?php } ?>>
	<?php include("title_bar.php"); ?>
	<div id="content">
		<?php include("sidebar.php"); ?>
		<table id="announcements" width="500">
			<thead>
				<tr>
					<?php
					$postID = $_GET['postID'];
					$postSelectionQuery =	"SELECT * FROM posts
											WHERE id = '$postID'";
					$post = $posts_db->query($postSelectionQuery)->fetch_row(); ?>
					<td class="viewablePost">
						<div id="account_sig"> <?php echo getFullName($post[2], $account_db); ?> says...</div>
						<pre style="margin:5px 5px 5px 185px">
						<?php echo wordwrap($post[1], 120, "<br />"); ?>
						</pre>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$commentsSelectionQuery =	"SELECT * FROM comments
											WHERE post_id = '$postID'";
				$comments = $posts_db->query($commentsSelectionQuery);
				for ($i = 0; $i < mysqli_num_rows($comments); $i++) {
					$comment = $comments->fetch_row(); ?>
					<tr>
				 		<td>
							<div align="left"> <?php echo getFullName($comment[2], $account_db) . " - " ; ?></div>
							<?php echo $comment[1]; ?>
						</td>
					</tr>
				<?php } if ($_SESSION['currentUser'] != "") { ?>
					<tr>
						<td>
							<form action="" method="get">
								<?php echo getFullName($_SESSION['currentUser'], $account_db) . ": "; ?><input type="text" name="comment" />
								<input type="hidden" name="postID" value="<?php echo $postID; ?>" />
								<input type="submit" value="Comment!" />
							</form>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<script type="text/javascript" language="javascript"> 
		var setAnnouncementsSize = function() {
			if (window.innerWidth - 270 > 300) {
				document.getElementById("announcements").width = window.innerWidth - 270;
			} else {
				document.getElementById("announcements").width = 300;
			}
		}
 
		setAnnouncementsSize();
		
		window.onresize = setAnnouncementsSize;
	</script>
</body>
</html>