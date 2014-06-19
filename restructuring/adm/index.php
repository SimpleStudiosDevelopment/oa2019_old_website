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

<title>Restructuring Admin Info</title>

<h1>Restructuring: Admin Panel</h1>

<div class="section">
    <div class="sector-head">
        <h2>Bad Rule</h2>
    </div>
    <div class="sector-a">
    	<h4 style="display:inline;">Status:</h4>
        <p style="display:inline; color:green;">Open</p>
        <br />
        <h4 style="display:inline;">Requests:</h4>
        <p style="display:inline;"><?php echo $data['bad_rule']?></p>
    </div>
    <a class="nouline" href="https://docs.google.com/spreadsheets/d/1H3Y-lq9ViKozlUP09DsmbjAbPiHFlOAxRDfpBssyc9Y/edit?usp=sharing" target="_blank">
    <div class="sector-a">
        <h4>Responses</h4>
    </div>
    </a>
    <a class="nouline" href="https://docs.google.com/forms/d/1kpBKJ0-b6oEcehUwfw_iLT2VWKepZIdFQ73ZWjr8q4U/viewform?usp=send_form" target="_blank">
    <div class="sector-a sector-foot">
        <h4>Form</h4>
    </div>
    </a>
</div>

<div class="section">
    <div class="sector-head">
        <h2>New Rule</h2>
    </div>
    <div class="sector-b">
    	<h4 style="display:inline;">Status:</h4>
        <p style="display:inline; color:green;">Open</p>
        <br />
        <h4 style="display:inline;">Requests:</h4>
        <p style="display:inline;"><?php echo $data['new_rule']?></p>
    </div>
    <a class="nouline" href="https://docs.google.com/spreadsheets/d/1FeWmXVGDCSyXGAS7YPPaN-MJLDq5IxSkkFYhtCDh3p8/edit?usp=sharing" target="_blank">
    <div class="sector-b">
        <h4>Responses</h4>
    </div>
    </a>
    <a class="nouline" href="https://docs.google.com/forms/d/1I7LAKvVntFAHG5TMsEyg5WLzy_O8uNdwumQeU_AnY68/viewform?usp=send_form" target="_blank">
    <div class="sector-b sector-foot">
        <h4>Form</h4>
    </div>
    </a>
</div>

<div class="section">
    <div class="sector-head">
        <h2>Bad Admin</h2>
    </div>
    <div class="sector-a">
    	<h4 style="display:inline;">Status:</h4>
        <p style="display:inline; color:green;">Open</p>
        <br />
        <h4 style="display:inline;">Requests:</h4>
        <p style="display:inline;"><?php echo $data['bad_admin']?></p>
    </div>
    <a class="nouline" href="https://docs.google.com/spreadsheets/d/1MhBrptrZaHDEQ7vhDj4OHFPN3DE49lsDgRIX6fmWgh4/edit?usp=sharing" target="_blank">
    <div class="sector-a">
        <h4>Responses</h4>
    </div>
    </a>
    <a class="nouline" href="https://docs.google.com/forms/d/1rTJHMmHHUSmxu6-w0K6_iuSsjdr1VYUv2elWjnP16TQ/viewform?usp=send_form" target="_blank">
    <div class="sector-a sector-foot">
        <h4>Form</h4>
    </div>
    </a>
</div>

<div class="section">
    <div class="sector-head">
        <h2>Request to be Admin</h2>
    </div>
    <div class="sector-b">
    	<h4 style="display:inline;">Status:</h4>
        <p style="display:inline; color:green;">Open</p>
        <br />
        <h4 style="display:inline;">Requests:</h4>
        <p style="display:inline;"><?php echo $data['new_admin']?></p>
    </div>
    <a class="nouline" href="https://docs.google.com/spreadsheets/d/1uKIdwY-ITGavmIsmgs3BjGNIOR6CRoWpLnGua-dxMVQ/edit?usp=sharing" target="_blank">
    <div class="sector-b">
        <h4>Responses</h4>
    </div>
    </a>
    <a class="nouline" href="https://docs.google.com/forms/d/1_sc07-sIeJ9vNhZUa_kukk0lGgMU7L0n_uyH-x9yBYY/viewform?usp=send_form" target="_blank">
    <div class="sector-b sector-foot">
        <h4>Form</h4>
    </div>
    </a>
</div>

<div class="section">
    <div class="sector-head">
        <h2>Admin Voting</h2>
    </div>
    <div class="sector-a">
    	<h4 style="display:inline;">Status:</h4>
        <p style="display:inline; color:#FC0;">Unopened</p>
        <br />
        <h4 style="display:inline;">Requests:</h4>
        <p style="display:inline;"><?php echo 'N/A'?></p>
    </div>
    <a class="nouline" href="#">
    <div class="sector-a">
        <h4>Responses</h4>
    </div>
    </a>
    <a class="nouline" href="#">
    <div class="sector-a sector-foot">
        <h4>Form</h4>
    </div>
    </a>
</div>

<div class="section">
    <div class="sector-head">
        <h2>Misc Suggestions</h2>
    </div>
    <div class="sector-b">
    	<h4 style="display:inline;">Status:</h4>
        <p style="display:inline; color:green;">Open</p>
        <br />
        <h4 style="display:inline;">Requests:</h4>
        <p style="display:inline;"><?php echo $data['misc']?></p>
    </div>
    <a class="nouline" href="https://docs.google.com/spreadsheets/d/1dj-cvKOmIlLkyKzZYl-ePW7FwnnqoZFwn4XGvfrC7UY/edit?usp=sharing" target="_blank">
    <div class="sector-b">
        <h4>Responses</h4>
    </div>
    </a>
    <a class="nouline" href="https://docs.google.com/forms/d/1jjLfyka-aE95UFLvsq_BLPpm51_n2n_zZOuv4c8B4do/viewform?usp=send_form" target="_blank">
    <div class="sector-b sector-foot">
        <h4>Form</h4>
    </div>
    </a>
</div>

