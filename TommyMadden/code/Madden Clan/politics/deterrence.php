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

<body background="../photos/blue-squares-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<div id="table-of-contents">
			<table cellspacing="10">
				<tr>
					<td bgcolor="#FFFFFF" style="text-align:center; font-size:18px">
						<p style="margin:10px 20px 10px 20px">One major argument for the use of capital punishment is that of deterrence.</p>
					</td>
				</tr>
				<tr>
					<td bgcolor="#FFFFFF" style="text-align:left; font-size:18px">
						<p style="margin:10px 20px 10px 20px">

The theory is that if capital punishment is put in place, the masses who consider crime as a viable option will refrain from crime for fear of death. This argument, entirely logical, assumes therefore that when it comes to law and order, people are motivated primarily by fear of repercussions for what they may do. Particularly in the United States, recidivism rates (rates that criminals go back to jail for the same crimes originally committed) are scarily high, as seen by this link: <br /><br />

<a href="http://www.cbsnews.com/news/once-a-criminal-always-a-criminal/" style="text-decoration:underline; color:#0000FF">CBS News: Once a Criminal, Always a Criminal</a><br /><br />

So something should be done about this problem. The question then becomes: Will enforcing capital punishment discourage criminals from repeating the same crimes they have done before, thus deterring them from breaking law and order for their own benefit? In the United States, several states have weaned off of capital punishment and back onto it. Using the empirical rates from each period for these states, criminologists can analyze how often capital punishment decreases recidivism rates and crime rates in general.<br /><br />

<a href="http://www.e-archives.ky.gov/pubs/Public_Adv/nov97/crime_control.htm" style="text-decoration:underline; color:#0000FF">The Advocate: Crime Control and the Death Penalty</a><br /><br />

According to this article specifically, capital punishment &quot;deter crimes in any way&quot;. Criminologists seem to agree on that subject for the United States, also, according to a study done in 2009 surveying criminologists in the United States:<br /><br />

<a href="http://www.deathpenaltyinfo.org/files/DeterrenceStudy2009.pdf" style="text-decoration:underline; color:#0000FF">Journal of Criminal Law and Criminology: Do Executions Lower Homicide Rates?</a><br /><br />

Although more information may surface sometime in the future, for the time being, it is safe to assume that capital punishment does not tend to deter crime for the demographics of the United States. With other countries, data taken from the United States may not be relevant, however, because it would be a different culture and a different people. In the same way, analyzing data taken from states in the U. S. is all that is necessary because other countries are not relevant to whether capital punishment discourages crime here in the United States.

						</p>
					</td>
				</tr>
			</table>
	</div>
</body>
</html>
