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
<title>Submit a Bible Verse!</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
</head>

<body background="photos/sunset-background.png">
	<?php include("title_bar.php"); ?>
	<div id="content">
		<?php include("sidebar.php"); ?>
		<div id="main_content">
			<?php
				function successfulSubmission() {
					echo "<div id='success'>Your bible verse was successfully submitted!</div>";
				}
				
				function unsuccessfulSubmission() {
					echo "<div id='failure'>Your bible verse was not submitted for some reason...</div>";
				}
			?>
			<div id="verse_submission">
				<form action="">
					Verse Signature: (&quot;Philippians 4:13&quot;) <input name="signature" type="text" /><br />
					Bible Verse: (&quot;I can do all things...&quot;) <input name="verse" type="text" /><br />
					<input type="submit" value="Submit Bible Verse!" />
				</form>
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

<?php
if (isset($_GET['signature'])) {
	require("DB/thingoftheday_db.php");
	$member_signature = mysqli_real_escape_string(trim($_GET['signature']));
	$member_verse = mysqli_real_escape_string(trim($_GET['verse']));
	$insertionQuery =	"INSERT INTO jokes
							(signature, verse)
						VALUES
							('$member_signature', '$member_verse')";
	$result = $thingoftheday_db->exec($insertionQuery);
	if ($result) {
		successfulSubmission();
	} else {
		unsuccessfulSubmission();
	}
}
?>