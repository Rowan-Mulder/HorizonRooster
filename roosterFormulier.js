let selectLocatie = document.getElementById('locatie');
let selectSector = document.getElementById('sector');
let selectRooster = document.getElementById('rooster');
let selectStudentOfDocent = document.getElementById('studentOfDocent');
let selectKlasOfDocent = document.getElementById('klasOfDocent');
let horizonJson;
let klasOfDocent;
let ingevuldeInputs = [0, 0, 0, 0]; // Bitwise operator uitproberen i.p.v. dit?


async function initJson(response) {
	horizonJson = await response.json();
	initialiseerFormulier();
}


async function jsonOphalen() {
	let response = await fetch('./horizonJson.json'); // Alle constante gegevens over Horizon College
	await initJson(response);
}


// Genereert de options binnen de 'Locatie' select-tag
function selectLocatieGenereren() {
	for (let i = 0; i < horizonJson.locatie.length; i++) {
		let option = document.createElement('option');
		option.text = horizonJson.locatie[i].naam;
		option.value = i;

		// Hoorn is als standaard geselecteerd
		if (option.text == 'Hoorn') {
			option.selected = true;
		}

		selectLocatie.add(option);
	}
	
	ingevuldeInputs[0] = 1;
	selectSectorenGenereren();
}


// Genereert de options binnen de 'Sector' select-tag
function selectSectorenGenereren() {
	selectSector.innerHTML = '';
	let locatie = selectLocatie.options.selectedIndex;

	for (let i = 0; i < horizonJson.locatie[locatie].sector.length; i++) {
		let option = document.createElement('option');
		option.text = horizonJson.locatie[locatie].sector[i].naam;
		option.value = i;

		// Economie is als standaard geselecteerd
		if (option.text == 'Economie') {
			option.selected = true;
		}

		selectSector.add(option);
	}
	
	ingevuldeInputs[1] = 1;
	selectRoostersGenereren();
}

// Genereert de options binnen de 'Rooster' select-tag
function selectRoostersGenereren() {
	selectRooster.innerHTML = '';
	let locatie = selectLocatie.options.selectedIndex;
	let sector = selectSector.options.selectedIndex;

	for (let i = 0; i < horizonJson.locatie[locatie].sector[sector].rooster.length; i++) {
		let option = document.createElement('option');
		option.text = horizonJson.locatie[locatie].sector[sector].rooster[i].naam;
		option.value = i;

		// (algemeen rooster) is als standaard geselecteerd
		if (option.text == '(algemeen rooster)') {
			option.selected = true
		}
		
		ingevuldeInputs[2] = 1;
		selectRooster.add(option);
		formulierIngevuldCheck();
    }
}

function formulierIngevuldCheck() {
	if (ingevuldeInputs[0] == 1 && ingevuldeInputs[1] == 1 && ingevuldeInputs[2] == 1) {
		selectKlasOfDocentGenereren();
		selectKlasOfDocentTr.style.display = 'table-row';
	} else {
		selectKlasOfDocentTr.style.display = 'none';
	}
}

function selectKlasOfDocentGenereren() {
	selectKlasOfDocent.innerHTML = '';
	KlasOfDocentRoosterOphalen();
}

//TODO: De fetch lijkt 4× uitgevoerd te worden zodra je de locatie veranderd. Kijk hier nog even naar, misschien via console.log() om te kijken of iets fout gaat binnen/buiten de functie.
async function KlasOfDocentRoosterOphalen() {
	let sector = horizonJson.locatie[selectLocatie.selectedIndex].sector[selectSector.selectedIndex].code;
	let rooster = horizonJson.locatie[selectLocatie.selectedIndex].sector[selectSector.selectedIndex].rooster[selectRooster.selectedIndex].code;
	let locatie = horizonJson.locatie[selectLocatie.selectedIndex].code;
	let studentOfDocent = selectStudentOfDocent.value;
	let url = 'klasZoeker.php?sector=' + selectSector.selectedIndex + '&locatie=' + selectLocatie.selectedIndex + '&rooster=' + selectRooster.selectedIndex + '&studentOfDocent=' + selectStudentOfDocent.value;
	let response = await fetch(url);
	await initKlasOfDocentRooster(response);
}

async function initKlasOfDocentRooster(response) {
	klasOfDocent = await response.json();
	
	for (let i = 0; i < klasOfDocent[0].length; i++) {
		let option = document.createElement('option');
		option.text = klasOfDocent[0][i]
		option.value = klasOfDocent[0][i]
		
		// H19AO-A is als standaard geselecteerd
		if (option.text == 'H19AO-A') {
			option.selected = true;
		}
		
		selectKlasOfDocent.add(option);
	}
}

// Bouwt het formulier op
function initialiseerFormulier() {
	selectLocatieGenereren();
}

jsonOphalen();