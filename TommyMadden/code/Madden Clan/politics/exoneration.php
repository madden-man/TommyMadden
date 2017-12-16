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
			<table cellspacing="10">
				<tr>
					<td bgcolor="#FFFFFF" style="text-align:center; font-size:18px">
						<p style="margin:10px 20px 10px 20px">One major argument against the use of capital punishment is that of criminals being exonerated because of new evidence.</p>
					</td>
				</tr>
				<tr>
					<td bgcolor="#FFFFFF" style="text-align:left; font-size:18px">
						<p style="margin:10px 20px 10px 20px">

When it comes to capital punishment, the stakes are big. Life or death for the criminal involved means a lot of pressure on the jury and the judge involved in the criminal's trial. The evidence has to weigh heavily towards the individual being guilty for capital punishment to happen as the punishment. There are, however, cases when more evidence is revealed after the trial that exonerates the criminal as innocent after all. When this happens, the criminal is released from prison and returns to society. However, when capital punishment is put in place as the punishment for a crime, an individual can be exonerated but never gets the chance to return to society and lead a potentially productive life. The exoneration rate, although it is fairly low for criminals condemned to die, is not zero.<br /><br />

<a href="http://www.deathpenaltyinfo.org/innocence-and-death-penalty" style="text-decoration:underline; color:#0000FF">Death Penalty Information Center: Innocence and the Death Penalty</a><br /><br />

As seen by the statistics per state of condemned criminals that are at some point exonerated, new evidence has been found for 156 criminals which saved them from the death penalty. This shows that although our justice system can come close to only condemning criminals that are guilty of the crime they are accused of, it is not entirely accurate. Arguably, therefore, capital punishment must not be in place, because that means there are some who will be executed even though they are innocent and proved innocent later on. Proponents of this argument also acknowledge that poorer criminals with terrible lawyers tend to be found guilty more often than criminals that have money. This unfairness inherent to the justice system is another reason why capital punishment can be unfair. It can weigh against the poor and in favor of criminals with better lawyers in some cases.<br /><br />

<a href="https://www.aclu.org/case-against-death-penalty" style="text-decoration:underline; color:#0000FF">ACLU: The Case Against the Death Penalty</a><br /><br />

Exoneration is a major reason why some disagree with the death penalty. No amount of evidence can ever truly prove that someone isn't innocent because as close as the justice system can get to finding the truth about each and every criminal, it will never be perfect, and even if capital punishment is justified for the majority of people it applies to, to some people, the few that are condemned even when innocent are worth ending the whole process.

						</p>
					</td>
				</tr>
			</table>		
	</div>
</body>
</html>
