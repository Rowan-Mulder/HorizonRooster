<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Rowan Mulder">
		<meta name="description" content="Rooster"><!--TODO: Voeg eventueel hier ook de naam van het rooster toe, zoals HEITO19AO-A-->
		<title>Rooster</title><!--TODO: Voeg eventueel hier ook de naam van het rooster toe, zoals HEITO19AO-A-->
		<link href="style.css" type="text/css" rel="stylesheet">
		<link href="images/Favicon.jpg" type="image/jpg" rel="icon">
		<?php
			$roosterCookieAanwezig = require 'cookieControle.php';
			
			if ($roosterCookieAanwezig) {
				echo '<script>var klasOfDocent = \'' . json_decode($_COOKIE['rooster'], true)['klasOfDocent'] . '\'</script>';
			} else {
				header('Location: roosterFormulier.php');
				exit;
			}
		?>
		<script defer src="main.js"></script>
		<script defer src="klasControle.js"></script>
	</head>
	<body>
		<noscript>
			<p id="jsFail"><u>JavaScript is uitgeschakeld</u></p>
		</noscript>
	
		<header>
			<div id="actionMenu">
				<input id="weekBackward" type="button" value="Week achteruit" onclick="WeekBackward()" title="Check het rooster van de vorige week">
				
				<span id="imageSpan">
					<div id="imageHC" style="user-select: none"></div>
				</span>
				
				<input id="weekForward" type="button" value="Week vooruit" onclick="WeekForward()" title="Check het rooster voor de volgende week">
			</div>
		</header>
		
		<main>
			<div id="embeddedWebpage">
			</div>
		</main>
		
		<footer></footer>
	</body>
</html>