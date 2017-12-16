<?php
session_start();
require("DB/account_db.php");
include("account_attributes.php");
require("registration.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Register!</title>
<link href="stylesheet.css" type="text/css" rel="stylesheet" />
</head>

<body background="photos/sunset-background.png">
	<?php include("title_bar.php"); ?>
	<div id="content">
		<?php include("sidebar.php"); ?>
		<div id="registration_form">
			<?php if ($accountSubmitted == "yes") { ?>
				<div id="success">Your account was successfully submitted! You are a member of the Madden family!</div>
			<?php } else if ($accountSubmitted == "no") { ?>
				<div id="failure">Your account was not submitted. Something went wrong..</div>
			<?php } if (!empty($errorArray)) { ?>
			<div id="registration_error">Looks like there\'s something wrong with the way you filled out that form. :(<br /><ul>
			<?php foreach ($errorArray as $error => $errorMessage) { ?>
				<li><?php echo $errorMessage; ?></li>
			<?php } ?>
			</ul></div>
			<br />
			<?php } ?>
			<form action="" method="post" enctype="multipart/form-data">
				First Name: <input type="text" name="firstname" class="register_input" /><br />
				Last Name: <input type="text" name="lastname" class="register_input" /><br />
				Gender: <input type="radio" name="gender" value="Male" /> Male   <input type="radio" name="gender" value="Female" /> Female   <input type="radio" name="gender" value="Other" /> Other<br /><br />
				Email: <input type="text" name="email" class="register_input" /><br />
				Password: <input type="password" name="pass" class="register_input" /><br />
				Retype Password: <input type="password" name="passCheck" class="register_input" /><br />
			 <div id="birthday-table">
			 <br />
				<script type="text/javascript">
				
					var show_birthday_month = function(show) {
						if (show) {
							document.getElementById("birthday_month_table").style.display = "table";
							document.getElementById("month_starter").style.display = "none";
						} else {
							document.getElementById("birthday_month_table").style.display = "none";
						}
					}
					
				 	var show_birthday_day = function(show, month) {
						document.getElementById("month").value = month;
						document.getElementById("display_month").type = "button";
						document.getElementById("display_month").value = month;
						show_birthday_month(false);
						if (show) {
							document.getElementById("birthday_day_table").style.display = "table";
						} else {
							document.getElementById("birthday_day_table").style.display = "none";
							document.getElementById("twenty-nine").type = "hidden";
							document.getElementById("thirty").type = "hidden";
							document.getElementById("thirty-one").type = "hidden";
						}
						if (month != 2) {
							document.getElementById("twenty-nine").type = "button";
							document.getElementById("thirty").type = "button";
						} if (month == 1 || month == 3 || month == 5 || month == 6 || month == 8 || month == 10 || month == 12) {
							document.getElementById("thirty-one").type = "button";
						}	
					}
					
					var show_birthday_year = function(show, day) {
						document.getElementById("day").value = day;
						document.getElementById("display_day").value = day;
						document.getElementById("display_day").type = "button";
						document.getElementById("birthday_day_table").style.display = "none";
						if (show) {
							document.getElementById("birthday_year_table").style.display = "table";
						} else {
							document.getElementById("birthday_year_table").style.display = "none";
						}
					}	
					
					var store_birthday_year = function(year) {
						document.getElementById("year").value = year;
						document.getElementById("display_year").value = year;
						document.getElementById("display_year").type = "button";
						document.getElementById("birthday_year_table").style.display = "none";
						document.getElementById("month_starter").style.display = "block";
					}
					
				 </script>
				 	<input type="hidden" name="month" value="" id="month" />
					<input type="hidden" name="day" value="" id="day" />
					<input type="hidden" name="year" value="" id="year" />
				 <a><div id="month_starter" onclick="show_birthday_month(true)" style="display:block">
				 <br />
				 <script type="text/javascript">
				 	if (document.getElementById("year").value === "") {
						document.write("Choose your birthday!");
					} else {
						document.write("Choose again!");
					}
				 </script>
				 </div></a>
				 <?php
				 	function successfulSubmission() {
						echo "<div id='success'>Your account was successfully created!</div>";
					}
			
				function unsuccessfulSubmission() {
					echo "<div id='failure'>Your account was not created for some reason...</div>";
				}
				 ?>
				<table id="birthday_month_table" style="display:none">
						<tr>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 1)" value="January">
							</td>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 2)" value="February">								
							</td>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 3)" value="March">
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 4)" value="April" />
							</td>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 5)" value="May" />
							</td>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 6)" value="June" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 7)" value="July" />
							</td>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 8)" value="August" />
							</td>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 9)" value="September" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 10)" value="October" />
							</td>
							<td>								
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 11)" value="November" />
							</td>
							<td>								
								<input type="button" class="birthmonth" onclick="show_birthday_day(true, 12)" value="December" />
							</td>							
						</tr>
					</table>
					<table id="birthday_day_table" style="display:none">
						<tr>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 1)" value="1" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 2)" value="2" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 3)" value="3" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 4)" value="4" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 5)" value="5" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 6)" value="6" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 7)" value="7" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 8)" value="8" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 9)" value="9" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 10)" value="10" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 11)" value="11" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 12)" value="12" />
							</td>
						</tr>						
						<tr>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 13)" value="13" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 14)" value="14" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 15)" value="15" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 16)" value="16" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 17)" value="17" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 18)" value="18" />
							</td>
						</tr>						
						<tr>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 19)" value="19" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 20)" value="20" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 21)" value="21" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 22)" value="22" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 23)" value="23" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 24)" value="24" />
							</td>
						</tr>						
						<tr>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 25)" value="25" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 26)" value="26" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 27)" value="27" />
							</td>
							<td>
								<input type="button" class="birthday" onclick="show_birthday_year(true, 28)" value="28" />
							</td>
						<td>
								<input type="hidden" class="birthday" id="twenty-nine" onclick="show_birthday_year(true, 29)" value="29" />
							</td>
							<td>
								<input type="hidden" class="birthday" id="thirty" onclick="show_birthday_year(true, 30)" value="30" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="hidden" class="birthday" id="thirty-one" onclick="show_birthday_year(true, 31)" value="31" />
							</td>
						</tr>
					<table id="birthday_year_table" style="display:none">
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2005)" value="2005" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2006)" value="2006" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2007)" value="2007" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2008)" value="2008" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2009)" value="2009" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2010)" value="2010" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2011)" value="2011" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2012)" value="2012" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2013)" value="2013" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2014)" value="2014" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1995)" value="1995" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1996)" value="1996" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1997)" value="1997" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1998)" value="1998" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1999)" value="1999" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2000)" value="2000" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2001)" value="2001" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2002)" value="2002" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2003)" value="2003" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(2004)" value="2004" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1985)" value="1985" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1986)" value="1986" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1987)" value="1987" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1988)" value="1988" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1989)" value="1989" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1990)" value="1990" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1991)" value="1991" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1992)" value="1992" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1993)" value="1993" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1994)" value="1994" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1975)" value="1975" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1976)" value="1976" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1977)" value="1977" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1978)" value="1978" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1979)" value="1979" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1980)" value="1980" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1981)" value="1981" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1982)" value="1982" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1983)" value="1983" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1984)" value="1984" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1965)" value="1965" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1966)" value="1966" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1967)" value="1967" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1968)" value="1968" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1969)" value="1969" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1970)" value="1970" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1971)" value="1971" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1972)" value="1972" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1973)" value="1973" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1974)" value="1974" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1955)" value="1955" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1956)" value="1956" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1957)" value="1957" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1958)" value="1958" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1959)" value="1959" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1960)" value="1960" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1961)" value="1961" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1962)" value="1962" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1963)" value="1963" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1964)" value="1964" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1945)" value="1945" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1946)" value="1946" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1947)" value="1947" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1948)" value="1948" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1949)" value="1949" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1950)" value="1950" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1951)" value="1951" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1952)" value="1952" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1953)" value="1953" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1954)" value="1954" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1935)" value="1935" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1936)" value="1936" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1937)" value="1937" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1938)" value="1938" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1939)" value="1939" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1940)" value="1940" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1941)" value="1941" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1942)" value="1942" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1943)" value="1943" />
							</td>
							<td>
								<input type="button" class="birthyear" onclick="store_birthday_year(1944)" value="1944" />
							</td>
						</tr>
					</table>
					<br />
					Current Selection: <input type="hidden" value="" id="display_month" /><input type="hidden" value="" id="display_day" /><input type="hidden" value="" id="display_year" />
				</div>
				<hr />
				<h2 align="center">Additional Info for your Account!</h2>
				Favorite Quotes: <input type="text" name="fav_quotes" class="register_input" /><br />
				Favorite Band/Artist: <input type="text" name="fav_band" class="register_input" /><br />
				<h3>Upload a Profile Pic! </h3><input type="file" name="profile_pic" class="register_input" /><br />
				If you are a biological member (step-members are members!) of the Madden family, you can state your generation here!
				<br />
				I am Tommy's <select name="gen_status" class="register_input">
					<option></option>
					<option>Cousin</option>
					<option>Brother</option>
					<option>Sister</option>				
					<option>Father</option>
					<option>Mother</option>
					<option>Aunt</option>
					<option>Uncle</option>
					<option>Great-aunt</option>
					<option>Great-uncle</option>
					<option>Grandfather</option>
					<option>Grandmother</option>
				</select>
				<input type="submit" /> 		
			</form>
		</div>
	</div>
</body>
</html>

<?php

function checkAccountExists($attempted_email) {
	include("DB/account_db.php");

	$selectionQuery = 	"SELECT email FROM login_info
						WHERE email = '$attempted_email'";
	$attempted_email_info = $account_db->query($selectionQuery)->fetch();
	if ($attempted_email_info[0] != null) {
		return true;
	} else {
		return false;
	}
}

?>