<?php
session_start();
require("DB/account_db.php"); 
include("account_attributes.php");

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
<title>Submit a Fun Fact!</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
</head>

<body background="photos/sunset-background.png" onload="welcomeToSite()">
	<div id="title">
		<a href="index.php" id="logo"></a>
		<?php if (!isset($_SESSION['currentUser'])) { ?> <a href="register.php" id="register_button"></a> <?php } ?>
	</div>
	<br />
	<div id="content">
		<div id="sidebar">
			<a href="family-tree/family-tree.php" id="family-tree-link"></a><br clear="left" />
			<a href="trogdor/trogdor-game.php" id="trogdor-link"></a><br clear="left"/>
			<a href="guitar/table-of-contents.php" id="guitar-link"></a><br clear="left"/>
			<?php if (!isset($_SESSION['currentUser'])) { ?>
				<div id="login-box"><p align="center">Login:</p> 
					<form action="" method="post"><div id="login">
						Username: 
						<br />
						<input type="text" name="email" class="login-info" /> 
						<br /><br />
						Password: 
						<br />
						<input type="password" name="pass" class="login-info" />
						<br />
						<input type="submit" />
					</div></form>
				</div>
			<?php } else {  ?>
				<div id="account-box">
					<a href="profile_page.php"><h3 align="center"><?php echo getFirstName($_SESSION['currentUser'], $account_db) . " " . getLastName($_SESSION['currentUser'], $account_db); ?></h3></a>
					
					<form action="" method="get"><input type="submit" name="logout" value="Log out!" /></form>
				</div>			
			<?php } ?>
			<div class="thing-of-the-day" id="jokes">
				<h4>Joke of the Day!</h4>
				<?php
					// Random Joke Acquired from Database
				?>
			</div>
			<div class="thing-of-the-day" id="facts">
				<h4>Fun Fact of the Day!</h4>
				<?php
					// Random Fact Acquired from Database
				?>
			</div>
			<div class="thing-of-the-day" id="verses">
				<h4>Verse of the Day!</h4>
				<?php
					// Random Verse Acquired from Database
				?>
			</div>
		</div>
		<?php
			function successfulSubmission() {
				echo "<div id='success'>Your fun fact was successfully submitted!</div>";
			}
			
			function unsuccessfulSubmission() {
				echo "<div id='failure'>Your fun fact was not submitted for some reason...</div>";
			}
		?>
		<br />
		<div id="fact_submission">
			<form action="" method="get">
				Fun Fact: <input name="fun_fact" type="text" /><br />
				<input type="submit" value="Submit Fun Fact!" />
			</form>
		</div>
	</div>
</body>
</html>

<?php
if (isset($_GET['fun_fact'])) {
	require("DB/thingoftheday_db.php");
	$member_fun_fact = mysqli_real_escape_string(trim($_GET['fun_fact']));
	$insertionQuery =	"INSERT INTO facts
							(fact)
						VALUES
							('$member_fun_fact')";
	$result = $thingoftheday_db->exec($insertionQuery);
	if ($result) {
		successfulSubmission();
	} else {
		unsuccessfulSubmission();
	}
}
?>