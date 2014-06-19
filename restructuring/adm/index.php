<link href='http://fonts.googleapis.com/css?family=Play:700|Merriweather+Sans:700|Droid+Sans' rel='stylesheet' type='text/css'>
<link href="../../styles/headers.css" rel="stylesheet">
<link href="../../styles/main.css" rel="stylesheet">
<script src="../../config/jquery.js"></script>


<?php
require_once "get_files.php";
require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Client.php";
require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Service/Drive.php";

require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Auth/OAuth2.php";
session_start();

$DRIVE_SCOPE = 'https://www.googleapis.com/auth/drive';
$EMAIL = '263092638129-q3rhclm4nrn4ottqaenfr7namv3vtjqp@developer.gserviceaccount.com';
$KEY_FILE_PATH = 'key.p12';

$key = file_get_contents($KEY_FILE_PATH);
$auth = new Google_Auth_AssertionCredentials(
    $EMAIL,
    array($DRIVE_SCOPE),
    $key);
$client = new Google_Client();
$client->setAssertionCredentials($auth);

$service = new Google_Service_Drive($client);

$formData = $service->files->get('0ByDyUerJE7tFbTYxQzhtVWJSUHM');

file_put_contents('form.txt',downloadFile($service, $formData, $client));

$sets = split("\n",file_get_contents('form.txt'));

$data = array();

foreach($sets as $val){
	$set = split(':', $val);
	$key = $set[0];
	$value = $set[1];
	$data[$key] = $value;
}
?>


<h1>Restructuring: Admin Panel</h1>

<div>

<div class="sector-head"><h3>Section Title</h3></div>

<div class="sector-a">
<h5 style="display:inline;">Status:</h5>
<p style="display:inline; color:green;">Open</p>

<h5 style="display:inline;">Requests:</h5>
<p style="display:inline;"> <?php $data['new_admin']?> </p>
</div>

<div class="sector-a"><p>See Responses (You must be admin)</p></div>
<div class="sector-a sector-foot">See Form</div>

</div>

<div>

<div class="sector-head"><h3>Section Title</h3></div>

<div class="sector-b">
<h5 style="display:inline;">Status:</h5>
<p style="display:inline; color:green;">Open</p>

<h5 style="display:inline;">Requests:</h5>
<p style="display:inline;"> <?php $data['new_admin']?> </p>
</div>

<div class="sector-b"><p>See Responses (You must be admin)</p></div>
<div class="sector-b sector-foot">See Form</div>

</div>