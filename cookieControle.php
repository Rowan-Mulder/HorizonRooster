<?php
$roosterCookieAanwezig = false;

/*// HOE DE $_POST ER UIT ZIET:
Array
(
    [locatie] => 2
    [sector] => 0
    [rooster] => 0
    [studentOfDocent] => student
    [selectKlasOfDocent] => H19AO-A
    [cookieOpslagduur] => 4
    [submitRooster] => 
)
//*/

if (!empty($_POST)) {
	// Het domein waar de cookie wordt opgeslagen. Staat ook localhost toe voor testen
	$domein = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;// localhost of server
	$secure = ($_SERVER['HTTP_HOST'] != 'localhost') ? true : false;// Bepaald of cookie voor http (localhost) of https (server) gemaakt wordt.
	
	$cookieOpslagDuurPost = (int)$_POST['cookieOpslagduur'];
	$cookieOpslagDuur = (86400 * 365) * $cookieOpslagDuurPost;
	
	// Slaat de cookies op
	setcookie('rooster', json_encode($_POST), time() + $cookieOpslagDuur, '/', $domein, $secure);
	$_COOKIE['rooster'] = json_encode($_POST);
	
	$roosterCookieAanwezig = true;
} elseif (isset($_COOKIE['rooster'])) {
	$roosterCookieAanwezig = true;
}

return $roosterCookieAanwezig;