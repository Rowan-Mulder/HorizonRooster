<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Rowan Mulder">
		<meta name="description" content="Rooster selecteren">
		<title>Rooster selecteren</title>
		<script defer src="roosterFormulier.js"></script>
		<link href='images/Favicon.jpg' type='image/jpg' rel='icon'>
	</head>
	
	<body>
		<header></header>
		
		<main>
			<form method="POST" action="index.php">
				<table>
					<tbody>
						<tr>
							<td>
								<label for="locatie">Locatie:</label>
							</td>
							<td>
								<select name="locatie" id="locatie" required onchange="selectSectorenGenereren(); formulierIngevuldCheck()">
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="sector">Sector:</label>
							</td>
							<td>
								<select name="sector" id="sector" required onchange="selectRoostersGenereren(); formulierIngevuldCheck()">
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="rooster">Rooster:</label>
							</td>
							<td>
								<select name="rooster" id="rooster" required onchange="formulierIngevuldCheck()">
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="studentOfDocent">Student/Docent:</label>
							</td>
							<td>
								<select name="studentOfDocent" id="studentOfDocent" required onchange="formulierIngevuldCheck()">
									<option value="student" selected>Student</option>
									<option value="docent">Docent</option>
								</select>
							</td>
						</tr>
						<tr id="selectKlasOfDocentTr" style="display: none">
							<td>
								<label for="klasOfDocent">Klas of Docent</label>
							</td>
							<td>
								<select name="klasOfDocent" id="klasOfDocent" required>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="cookieOpslagduur">Cookie opslagduur:</label>
							</td>
							<td>
								<select name="cookieOpslagduur" id="cookieOpslagduur" required>
									<option value="1">1 jaar</option>
									<option value="2">2 jaar</option>
									<option value="3">3 jaar</option>
									<option value="4" selected>4 jaar</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<button name="submitRooster" type="submit">Submit</button>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</main>
	</body>
</html>