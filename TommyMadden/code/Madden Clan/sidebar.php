<?php require("DB/thingoftheday_db.php"); ?>

<div id="sidebar">
	<a href="http://maddenclan.net/family-tree/family-tree.php" id="family-tree-link"></a><br clear="left" />
	<a href="http://maddenclan.net/trogdor/trogdor-game.php" id="trogdor-link"></a><br clear="left"/>
	<a href="http://maddenclan.net/guitar/table-of-contents.php" id="guitar-link"></a><br clear="left"/>
	<?php if (!isset($_SESSION['currentUser'])) { ?>
		<div id="login-box"><p align="center">Login:</p> 
			<form action="" method="post"><div id="login">
				Email:
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
			<a href="http://maddenclan.net/profile_page.php"><h3 align="center"><?php echo getFullName($_SESSION['currentUser'], $account_db) ?></h3></a>
			<p align="center"><img src="<?php
				$profilePath = getProfilePath($_SESSION['currentUser'], $account_db);
				echo "http://maddenclan.net/photos/" . $profilePath;	?>" /></p>
			<form action="" method="get"><p align="center"><input type="submit" name="logout" value="Log out!" /></p></form>
		</div>			
	<?php } ?>
	<div class="thing-of-the-day" id="jokes">
		<a href="http://maddenclan.net/jokes.php"><h4>Joke of the Day!</h4></a>
		<?php
			// Random Joke Acquired from Database
			$random = rand(1, 200);						// Random integer between 1 and 200, inclusive
			$selectionQuery =	"SELECT * FROM jokes
								WHERE id = 1";
			$joke = $thingoftheday_db->query($selectionQuery)->fetch_row();
			echo "Question: " . $joke[1] . "<br /><br />";
			echo "Answer: " . $joke[2];
		?>
	</div>
	<div class="thing-of-the-day" id="facts">
		<a href="http://maddenclan.net/facts.php"><h4>Fun Fact of the Day!</h4></a>
		<?php
			// Random Fact Acquired from Database
			$selectionQuery =	"SELECT * FROM facts
								WHERE id = 1";
			$fact = $thingoftheday_db->query($selectionQuery)->fetch_row();
			echo "Fact: " . $fact[1];
		?>
	</div>
	<div class="thing-of-the-day" id="verses">
		<a href="http://maddenclan.net/verses.php"><h4>Verse of the Day!</h4></a>
		<?php
			// Random Verse Acquired from Database
			$selectionQuery =	"SELECT * FROM verses
								WHERE id = 1";
			$verse = $thingoftheday_db->query($selectionQuery)->fetch_row();
			echo $verse[1] . " - " . $verse[2];
		?>
	</div>
</div>
<br /><br />