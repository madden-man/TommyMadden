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
<title>Madden Clan</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
</head>

<body background="photos/sunset-background.png">
	<?php include("title_bar.php"); ?>
	<div id="content">
		<?php include("sidebar.php"); ?>
		<div id="main_content">
			<h1 align="center">Tommy and Athena (friend) Singing &quot;Lucky&quot; by Jason Mraz!</h1>
			<div align="center">
				<iframe width="854" height="480" src="https://www.youtube.com/embed/2kYtSJFtico" frameborder="0" class="vid"></iframe>
			</div>
			<h1 align="center">Joe and Tommy Running Through the Saratoga Banner!</h1>
			<div align="center">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/V6gzDUNfHFQ" frameborder="0" class="vid"></iframe>
			</div>
		</div>
	</div>
	<script type="text/javascript" language="javascript"> 
		var setMainContentSize = function() {
			if (window.innerWidth - 280 > 500) {
				document.getElementById("main_content").width = window.innerWidth - 280;
			} else {
				document.getElementById("main_content").width = 500;
			}
		}
 
		setMainContentSize();
		
		window.onresize = setMainContentSize;
	</script>
</body>
</html>