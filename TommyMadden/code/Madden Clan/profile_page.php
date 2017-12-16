<?php
session_start();
require("DB/account_db.php"); 
require("DB/posts_db.php");
include("account_attributes.php");

if ($_GET['logout'] == "Log out!") {
	unset($_SESSION['currentUser']);
}

if (!isset($_SESSION['currentUser']) && checkAccountInfo($_POST['email'], $_POST['pass'], $account_db)) {
	$_SESSION['currentUser'] = $_POST['email'];
}

if ($_POST['post'] != "") {
	$post = mysqli_real_escape_string($posts_db, $_POST['post']);
	$currentUser = $_SESSION['currentUser'];
	$result = "";
	if ($_POST['visibility'] == "Everyone!") {
		$insertionQuery =	"INSERT INTO posts
								(post, email, dateTimePosted)
							VALUES
								('$post', '$currentUser', NOW())";
		$result = $posts_db->query($insertionQuery);
		if ($result) {
			$sentFromEmail = $_SESSION['currentUser'];
			$selectionQuery =	"SELECT email FROM account_info";
			$newResult = $account_db->query($selectionQuery);
			for ($i = 0; $i < $newResult->rowCount(); $i++) {
				$row = $newResult->fetch()[0];
				$mailResult = mail($row, "New post from '$sentFromEmail'!", "Log on to http://maddenclan.net/ to see the new post!");
			}
		}
	} else {
		$visibility = $_POST['visibility'];
		$insertionQuery =	"INSERT INTO posts
								(post, email, visibility, dateTimePosted)
							VALUES
								('$post', '$currentUser', '$visibility', NOW())";
		$result = $posts_db->query($insertionQuery);
		if ($result && $visibility == "Only Kids!") {
			$sentFromEmail = $_SESSION['currentUser'];
			$selectionQuery =	"SELECT email FROM account_info";
			$newResult = $account_db->query($selectionQuery);
			for ($i = 0; $i < $newResult->rowCount(); $i++) {
				$row = $newResult->fetch()[0];
				if (!isAdult($sentFromEmail, $account_db)) {
					$mailResult = mail($row, "New post from '$sentFromEmail'!", "Log on to http://maddenclan.net/ to see the new post!");
				}
			}
		} else if ($result && $visibility == "Only Adults!") {
			$sentFromEmail = $_SESSION['currentUser'];
			$selectionQuery =	"SELECT email FROM account_info";
			$newResult = $account_db->query($selectionQuery);
			for ($i = 0; $i < $newResult->rowCount(); $i++) {
				$row = $newResult->fetch()[0];
				if (isAdult($sentFromEmail, $account_db)) {
					$mailResult = mail($row, "New post from '$sentFromEmail'!", "Log on to http://maddenclan.net/ to see the new post!");
				}
			}
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="favicon.ico" type="image/x-icon" rel="icon" />
<title>Profile Page!</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
</head>

<body background="photos/sunset-background.png">
	<?php include("title_bar.php"); ?>
	<div id="content">
		<?php include("sidebar.php"); ?>
		<br />
		<div id="display_account_info">
			<?php
				if ($_GET['accountViewedEmail'] == "" && !isset($_SESSION['currentUser'])) { ?>
				<div id="error">Error! Could not connect to the account!</div>
			<?php } else if ($_GET['accountViewedEmail'] != "") {
					$accountEmail = getEmail($_GET['accountViewedEmail'], $account_db); ?>
				<h1 align="center"><?php echo getFullName($accountEmail, $account_db); ?></h1><br />
				<table>
					<tr>
						<td> <h3> Gender: <?php echo getGender($accountEmail, $account_db); ?> </h3></td>
						<td> <h3> Birthday: <?php echo getBirthday($accountEmail, $account_db); ?></h3></td>
					</tr>
					<tr>
						<?php if (getFavQuotes($accountEmail, $account_db)) { ?>
						<td> <h3> Favorite Quotes: <?php echo getFavQuotes($accountEmail, $account_db); ?> </h3></td>
						<?php } if (getFavBand($accountEmail, $account_db)) { ?> 
						<td> <h3> Favorite Band: <?php echo getFavBand($accountEmail, $account_db); ?> </h3> </td>
						<?php } ?>
					</tr>
				</table>
			<?php } else { ?>
				<h1 align="center"><?php echo getFullName($_SESSION['currentUser'], $account_db); ?></h1><br />
				<table>
					<tr>
						<td> <h3> Gender: <?php echo getGender($_SESSION['currentUser'], $account_db); ?> </h3></td>
						<td> <h3> Birthday: <?php echo getBirthday($_SESSION['currentUser'], $account_db); ?></h3></td>
					</tr>
					<tr>
						<?php if (getFavQuotes($_SESSION['currentUser'], $account_db)) { ?>
						<td> <h3> Favorite Quotes: <?php echo getFavQuotes($_SESSION['currentUser'], $account_db); ?> </h3></td>
						<?php } if (getFavBand($_SESSION['currentUser'], $account_db)) { ?> 
						<td> <h3> Favorite Band: <?php echo getFavBand($_SESSION['currentUser'], $account_db); ?> </h3> </td>
						<?php } ?>
					</tr>
				</table>
			<?php } ?>
		</div>
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
				<?php
				$selectionQuery =	"SELECT * FROM posts";
				$postsList = $posts_db->query($selectionQuery);
				for ($i = 0; $i < mysqli_num_rows($postsList); $i++) {
					$post = $postsList->fetch_row(); ?>
				<tr>
					<td class="viewablePost">
						<div id="account_sig"> <?php echo getFullName($post[2], $account_db); ?> says...</div>
				 		<p align="center"><?php echo $post[1]; ?></p>
					</td>
					<form action="display_post.php" method="get">
						<td style="width:50px, height:50px">
							<input type="hidden" name="postID" value="<?php echo $post[0]; ?>" />
							<input type="submit" value="" class="see_more" style="width:50px, height:40px" />
						</td>
					</form>
				</tr>
				 <?php } /* ?>
				<tr height="30">
				 	<td>
						This is where I'll put the arrows to move pages.
					</td>
				</tr> <?php */ ?>
			</tbody>
		</table>
	</div>
</body>
</html>

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