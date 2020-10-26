let cookies = document.cookie;
let roosterCookie = cookies.split('; ');
let schoolRooster;
let schoolSector;
let schoolLocatie;
let schoolStudentOfDocent;
let klassenArray;


async function GetJSON() {
	let response = await fetch("horizonJson.json");
	horizonJson = await response.json();
}

for (let i = 0; i < roosterCookie.length; i++) {
	if (roosterCookie[i].trim().substring(0, 7) === 'rooster') {
		let cookie = JSON.parse(decodeURIComponent(roosterCookie[i]).substring(8));
		schoolRooster = cookie.rooster;
		schoolSector = cookie.sector;
		schoolLocatie = cookie.locatie;
		schoolStudentOfDocent = cookie.studentOfDocent;
		
		Initialiseren();
		
		if (cookie.studentOfDocent === 'docent') {
			studentOfDocent = 't';
		} else {
			studentOfDocent = 'c';
		}
		
		break;
	}
}

async function Initialiseren() {
	await GetJSON();
	locatie = horizonJson.locatie[schoolLocatie].code;
	sector = horizonJson.locatie[schoolLocatie].sector[schoolSector].code;
	rooster = horizonJson.locatie[schoolLocatie].sector[schoolSector].rooster[schoolRooster].code;
	ClassNumOphaler();
}

async function ClassNumOphaler() {
	let url = 'klasZoeker.php?sector=' + schoolSector + '&locatie=' + schoolLocatie + '&rooster=' + schoolRooster + '&studentOfDocent=' + schoolStudentOfDocent;
	let response = await fetch(url);
	await ClassNumVerwerker(response);
}

async function ClassNumVerwerker(response) {
	klassenArray = await response.json();
	await AAA();
}

function AAA() {
	classNum = (klassenArray[0].findIndex(KeyIdFinder) + 1);
	WeekSet();
}

function KeyIdFinder(value) {
	return value == klasOfDocent;
}