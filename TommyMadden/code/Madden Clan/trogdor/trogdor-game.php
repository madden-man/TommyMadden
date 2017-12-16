<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="controls.css" type="text/css" rel="stylesheet" />
<link href="../favicon.ico" type="image/x-icon" rel="icon" />
<title>Trogdor Game!</title>
</head>

<body background="../photos/grassy-background.png">
	<?php include("../title_bar.php"); ?>
	<div id="content">
		<?php include("../sidebar.php"); ?>
		<div>
			<p align="center">
			<applet width="800" height="600" class="game">
				<h1>The game should appear here! Otherwise, you do not have Java enabled.</h1>
			</applet>
			</p>
			<div class="controls" style="margin-top:20px; height: 220px; width: 500px">
				<h2 class="controls"> Controls </h2>
				<div class="controls" style="height:181px">
					<p id="left-controls">W = Move Up<br /><br />
										  S = Move Down
					</p>
					<p id="right-controls">A = Move Left<br /><br />
										   D = Move Right
					</p>
					<p id="bottom-controls" style="width: 494px; margin-top:135px">
						Space = BURNINATE!!!!
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
