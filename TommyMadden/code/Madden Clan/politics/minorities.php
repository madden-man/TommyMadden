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
						<p style="margin:10px 20px 10px 20px">One major argument against the use of capital punishment is that of unjust punishment of minorities.</p>
					</td>
				</tr>
				<tr>
					<td bgcolor="#FFFFFF" style="text-align:left; font-size:18px">
						<p style="margin:10px 20px 10px 20px">

Empirical data of defendants for homicides and the condemnation of those defendants shows a distinction of percentage based on race. People of certain races and skin colors tend to be condemned to the death penalty at a higher rate than other races. This phenomenon is shown with actual data here:<br /><br />

<a href="http://deathpenalty.org/article.php?id=54" style="text-decoration:underline; color:#0000FF">Death Penalty Focus: Racial Disparities</a><br /><br />

This disparity between races could be the result of two things. Firstly, it could mean that some judges and juries are racist in their pronouncements and sentencing. If the people randomly selected to be the jury for a case are racist and choose a harsher punishment, or the judge is racist instead of being impartial, the entire judicial system falls apart. One safeguard against this happening happens during jury selection, however, where only people who are unbiased for race and who care about seeking the truth are allowed to be the jury for these kinds of cases.<br /><br />

<a href="http://www.capitalpunishmentincontext.org/issues/juryinstruct" style="text-decoration:underline; color:#0000FF">Capital Punishment In Context: What Jurors Understand</a><br /><br />

Jurors must, at least theoretically, be unbiased for race, class, and gender to participate in the jury. They must also have no qualms with capital punishment itself to be a part of the jury in a capital case, since courts are allowed to eliminate potential jurors who would not vote for the death penalty regardless of fault. Our judicial system has safeguards against racist and sexist jurors, and the extent to which they successfully make the judicial process fair is debatable in itself. The other possible reason why there is a disparity between race for people condemned to death is that people that are of that other race are legitimately more likely to have committed the crime. Minorities usually grow up in a similar environment - white people are usually privileged and grow up in some kind of safer suburban neighborhood, leaving for no reason for the white person to commit crime and no experience with homicide or gangs. Minorities, however, can sometimes grow up in more ghetto neighborhoods, leading them to need to commit crime to provide for their families or making crime seem more normal because it is more common. This is not a racist possibility - it is simply based on the conditions that individuals grow up in, and is reported in this article:<br /><br />

<a href="http://www.jacksonfreepress.com/news/2011/oct/19/the-poverty-crime-connection/" style="text-decoration:underline; color:#0000FF">The Jackson Free Press: The Poverty-Crime Connection</a><br /><br />

Poorer communities have higher crime rates, and minorities tend to live in poorer communities. This is simply an observation. This and the original racist explanation for a disparity between rates show a difference between rates of condemnation for white people and for minorities. Both reasons could potentially be contributing to the statistic, or just one. In any case, people arguing against capital punishment argue that judges and juries are racist, while people arguing for capital punishment tend to argue that it is because those minorities grow up in poorer communities.

						</p>
					</td>
				</tr>
			</table>	
	</div>
</body>
</html>
