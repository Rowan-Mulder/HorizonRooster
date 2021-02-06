var horizonJson;
var studentOfDocent;
var rooster;
var sector;
var locatie;
let classNum;


function GetWeekNumber(d) {
	d = new Date(Date.UTC (d.getFullYear(), d.getMonth(), d.getDate()));
	d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay() || 7));
	var yearStart = new Date(Date.UTC (d.getUTCFullYear(), 0, 1));
	var weekNo = Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
	return [weekNo];
}

var weekNum = GetWeekNumber(new Date());
//cXXXXX is the schedule specified for each class by number. Order of numbers is based on listing order. This order will change over time.
var leadingZero;


function WeekSet() {
	CorrectLeadingZeros();
	
	if (locatie != "ALK") {
		//																																						  https://rooster.horizoncollege.nl/rstr/    ECO       /    HRN        /Roosters/    09                                     /    c                  /    c                 000           36          .htm
		document.getElementById("embeddedWebpage").innerHTML = "<iframe id=\"inlineFrame\" width=\"100%\" height=\"100%\" title=\"Rooster Horizon College\" src=\"https://rooster.horizoncollege.nl/rstr/" + sector + "/" + rooster + "/Roosters/" + (weekNum + "").padStart(2, "0") + "/" + studentOfDocent + "/" + studentOfDocent + leadingZero + classNum + ".htm\" frameborder=\"0\"></iframe>";
	} else {
		document.getElementById("embeddedWebpage").innerHTML = "<iframe id=\"inlineFrame\" width=\"100%\" height=\"100%\" title=\"Rooster Horizon College\" src=\"https://rooster.horizoncollege.nl/rstr/" + sector + "/" + rooster + "/Roosters/" + studentOfDocent + "/" + (weekNum + "").padStart(2, "0") + "/" + studentOfDocent + leadingZero + classNum + ".htm\" frameborder=\"0\"></iframe>";
	}
}

function WeekBackward() {
	weekNum--;
	WeekSet();
}

function WeekForward() {
	weekNum++;
	WeekSet();
}

function CorrectLeadingZeros() {
	if (classNum > 9) {
		leadingZero = "000";
	} else {
		leadingZero = "0000";
	}
}

function DeSelect() {
	window.getSelection().removeAllRanges();
}