<?php
session_start();
require("DB/account_db.php");
require("DB/thingoftheday_db.php");
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
<title>Submit a Joke!</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
</head>

<body background="photos/sunset-background.png">
	<?php include("title_bar.php"); ?>
	<div id="content">
		<?php include("sidebar.php"); ?>
		<div id="main_content">
			<?php
				function successfulSubmission() { ?>
					<div id='success'>Your joke was successfully submitted!</div>
			<?php }
				
				function unsuccessfulSubmission() {
			?>		<div id='failure'>Your joke was not submitted for some reason...</div>
			<?php	} ?>
			<div id="joke_submission">
				<form action="">
					Question: <input name="question" type="text" class="big_text" /><br />
					Answer: <input name="answer" type="text" class="big_text" /><br />
					<input type="submit" value="Submit Joke!" />
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
if (isset($_GET['question'])) {
	$member_question = mysqli_real_escape_string($thingoftheday_db, $_GET['question']);
	$member_answer = mysqli_real_escape_string($thingoftheday_db, $_GET['answer']);
	$insertionQuery =	"INSERT INTO jokes
							(question, answer)
						VALUES
							('$member_question', '$member_answer')";
	$result = $thingoftheday_db->query($insertionQuery);
	if ($result) {
		successfulSubmission();
	} else {
		unsuccessfulSubmission();
	}
}

?>