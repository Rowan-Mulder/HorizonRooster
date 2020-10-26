<?php
// TODO: Dit formulier gebruiken d.m.v. een fetch i.p.v. include, zodat het roosterformulier maar 1 pagina hoeft te wezen.
if (!isset($_GET['sector']) || !isset($_GET['locatie']) || !isset($_GET['rooster']) || !isset($_GET['studentOfDocent'])) {
	echo json_encode([
		'status' => 'failed1'
	]);
	return;
}

// Haalt het horizonJson.json bestand op voor alle nodigde data
$json = json_decode(file_get_contents('./horizonJson.json'), true);
$sector = $json['locatie'][$_GET['locatie']]['sector'][$_GET['sector']]['code'] ?? '';
$rooster = $json['locatie'][$_GET['locatie']]['sector'][$_GET['sector']]['rooster'][$_GET['rooster']]['code'] ?? '';
$studentOfDocent = $_GET['studentOfDocent'];

if (empty($sector) || empty($rooster)) {
	echo json_encode([
		'status' => 'failed2'
	]);
	return;
}

// URL encoding opgelost met str_replace(), want urlencode() zijn spatievervanging naar '+' wordt niet geaccepteerd door de server. van horizoncollege.
// Bij roosters van Purmerend (locatie 3) wordt '/Rooster' niet gebruikt.
if ($_GET['locatie'] == 3) {
	$url = 'https://rooster.horizoncollege.nl/rstr/' . str_replace(' ', '%20', $sector) . '/' . str_replace(' ', '%20', $rooster) . '/frames/navbar.htm';
} else {
	$url = 'https://rooster.horizoncollege.nl/rstr/' . str_replace(' ', '%20', $sector) . '/' . str_replace(' ', '%20', $rooster) . '/Roosters/frames/navbar.htm';
}


$html = file_get_contents($url);

// Haalt de klassen of docenten op via regex
if ($_GET['studentOfDocent'] === 'student') {
	if(!preg_match('/(?<=var classes = \[)\".+\"(?=\])/', $html, $matches)) {
		echo json_encode([
			'status' => 'failed3'
		]);
		return;
	}
} else if ($_GET['studentOfDocent'] === 'docent') {
	if(!preg_match('/(?<=var teachers = \[)\".+\"(?=\])/', $html, $matches)) {
		echo json_encode([
			'status' => 'failed4'
		]);
		return;
	}
} else {
	echo json_encode([
        'status' => 'failed5'
    ]);
	return;
}

echo json_encode([str_replace('"', '', explode('",', $matches[0]))]);