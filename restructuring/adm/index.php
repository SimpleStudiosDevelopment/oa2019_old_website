<h1>Restructuring Admin Panel</h1>

<?php
require_once "get_files.php";
require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Client.php";
require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Service/Drive.php";

$client = new Google_Client();

if(isset($_GET["code"])){
	$authCode = $_GET["code"];
	$accessToken = $client->authenticate($authCode);
	$client->setAccessToken($accessToken);

} else{
	$client->setClientId('263092638129-2lmj2jl73q80v5s5g8ufo5f0odsm87q5.apps.googleusercontent.com');
	$client->setClientSecret('-rH0qpcnCo_2H0nz-5wYGAUF');
	$client->setRedirectUri('http://oa2019.tk/restructuring/adm');
	$client->setScopes(array('https://www.googleapis.com/auth/drive'));
	$authUrl = $client->createAuthUrl();
	header('Location: ' . $authCode);
}


?>