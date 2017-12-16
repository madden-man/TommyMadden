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
			<?php if (isset($_SESSION['currentUser'])) { ?>
			<thead>
				<tr>
					<td colspan="2">	
						<div id="newPost">
							<form action="profile_page.php" method="post">
								<h2 id="heading">Would you like to post something new?</h2><br />
								<textarea name="post" rows="4" cols="100">What's on your mind?</textarea><br />
								<p style="font-size:9px;color:#666666;margin-left:30px" align="left">Who should see your post?
								<select style="margin-left:5px" name="visibility">
									<option>Everyone!</option>
									<option>Only Kids!</option>
									<option>Only Adults!</option>
								</select></p><input type="submit" value="Post!" />
							</form>
							<hr />
						</div>
					</td>
				</tr>
			</thead>
			<?php } ?>
			<tbody>
				<script type="text/javascript">
				
				var loadPosts = function(var boolean) {
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (xhttp.readyState == 4 && xhttp.status == 200 && boolean == true) {
							document.getElementById("postButton").style.display = "none";
							document.getElementById("showPosts").style.display = "inline";
						}
					}
				}
				
				</script>
				<br />
				<button onclick="loadPosts(true)" value="Load Posts!" id="postButton" style="display:block"></button>
				<p id="showPosts" style="display:none">;
				<?php
				$selectionQuery =	"SELECT * FROM posts";
				$postsList = $posts_db->query($selectionQuery);
				for ($i = 0; $i < mysqli_num_rows($postsList); $i++) {
					$post = $postsList->fetch_row(); ?>
				<tr>
					<td class="viewablePost">
						<div id="account_sig"> <?php echo getFullName($post[2], $account_db); ?> says...</div>
						<p align="center"> <?php echo $post[1]; ?></p>
					</td>
					<form action="display_post.php" method="get">
						<td>
							<input type="hidden" name="postID" value="<?php echo $post[0]; ?>" />
							<input type="submit" value="" class="see_more" />
						</td>
					</form>
				</tr>
				 <?php } /* ?>
				<tr>
				 	<td>
						This is where I'll put the arrows to move pages.
					</td>
				</tr> <?php */ ?>
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