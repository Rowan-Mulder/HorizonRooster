<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Rowan Mulder">
		<meta name="description" content="Klas of docent selecteren">
		<title>Klas of docent selecteren</title>
		<link href='images/Favicon.jpg' type='image/jpg' rel='icon'>
	</head>
	
	<?php
		include_once('klasZoeker.php');
	?>
	
	<body>
		<header></header>
		
		<main>
			<form method="POST" action="index.php">
				<table>
					<tbody>
						<tr>
							<td>
								<label for="klasOfDocent">Klas of Docent:</label>
							</td>
							<td>
								<select name="klasOfDocent" required>
									<?php
										include_once('klasZoeker.php');
										
										for($i = 0; $i < count($classesArray); $i++) {
											echo '<option value="' . $i . '"' . (($classesArray[$i] == 'H19AO-A') ? ' selected' : '') . '>' . $classesArray[$i] . '</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr style="display: none">
							<td>
								<input name="postRooster" type="text" value="<?php echo str_replace('"', "'", json_encode($_POST)) ?>">
							</td>
						</tr>
						<tr>
							<td>
								<button name="submitKlasOfDocent" type="submit">Submit</button>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</main>
		
		</footer>
			<p><i>Met het versturen van dit formulier ga je akkoord met het opslaan van cookies op je apparaat. Hiermee wordt jouw invoer lokaal opgeslagen zodat je maar 1 keer jouw rooster hoeft te selecteren.<i></p>
			<p><i>By submitting this form you agree on storing cookies on your device. This stores your input locally so that you only have to select your timetable once.<i></p>
		</footer>
	</body>
</html>