<?php
session_start();

require("../DB/account_db.php");
include("../account_attributes.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="tree-stylesheet.css" type="text/css" rel="stylesheet" />
<link href="../favicon.ico" type="image/x-icon" rel="icon" />
<title>Family Tree</title>
</head>

<body background="../photos/ocean-background.png" onload="setFamilyTreeSize()">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<br /><br />
		<div id="family-tree">
			<form action="../profile_page.php" method="get">
				<table id="thirdGen">
				<?php 
				$thirdGenSelectionQuery =	"SELECT * FROM account_info
											WHERE generation = 2
											ORDER BY birthday";
				$thirdGen = $account_db->query($thirdGenSelectionQuery);
				for ($i = 0; $i < $thirdGen->rowCount(); $i++) {
					$grandparent = $thirdGen->fetch();
					if ($grandparent[3] == "Male") { ?>
						<input class="third-gen-boy" type="submit" name="accountViewedEmail" value="<?php echo $grandparent[1] . " " . $grandparent[2]; ?>" />
					<?php } else if ($grandparent[3] == "Female") { ?>
						<input class="third-gen-girl" type="submit" name="accountViewedEmail" value="<?php echo $grandparent[1] . " " . $grandparent[2]; ?>" />	
					<?php } 
					} ?>
				</table>
				<table id="secondGen">
					<tr>
					<?php 
					$secondGenSelectionQuery =	"SELECT * FROM account_info
												WHERE generation = 1
												ORDER BY birthday";
					$secondGen = $account_db->query($secondGenSelectionQuery);
					for ($i = 0; $i < $secondGen->rowCount(); $i++) {
						$parent = $secondGen->fetch();
						if ($parent[3] == "Male") { ?>							
							<td><input class="second-gen-boy" type="submit" name="accountViewedEmail" value="<?php echo $parent[1] . " " . $parent[2]; ?>" /></td>
					<?php } else if ($parent[3] == "Female") { ?>							
							<td><input class="second-gen-girl" type="submit" name="accountViewedEmail" value="<?php echo $parent[1] . " " . $parent[2]; ?>" /></td>
					<?php } 
					} ?>
					</tr>
				</table>
				<table id="firstGen">
					<tr>
					<?php
					$firstGenSelectionQuery =	"SELECT * FROM account_info
												WHERE generation = 0
												ORDER BY birthday";
					$firstGen = $account_db->query($firstGenSelectionQuery);
					for ($i = 0; $i < $firstGen->rowCount(); $i++) {
						$kid = $firstGen->fetch();
						if ($kid[3] == "Male") { ?>							
							<td><input class="first-gen-boy" type="submit" name="accountViewedEmail" value="<?php echo $kid[1] . " " . $kid[2]; ?>" /></td>
						<?php } else { ?>							
							<td><input class="first-gen-girl" type="submit" name="accountViewedEmail" value="<?php echo $kid[1] . " " . $kid[2]; ?>" /></td>
						<?php }
					} ?>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<script type="text/javascript" language="javascript"> 
		var setFamilyTreeSize = function() {
			if (window.innerWidth - 270 > 300) {
				document.getElementById("family-tree").width = window.innerWidth - 270;
			} else {
				document.getElementById("family-tree").width = 300;
			}
		}
 
		setFamilyTreeSize();
		
		window.onresize = setFamilyTreeSize;
	</script>
</body>
</html>
