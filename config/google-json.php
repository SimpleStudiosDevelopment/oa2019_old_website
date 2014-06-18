<?php

$header = "{\"alg\":\"RS256\",\"typ\":\"JWT\"} }";

$clientId = "1045633523516-ag6b3iufb9uhn1oaqv257r04ccghb66a.apps.googleusercontent.com";

$ait = time();
$exp = $ait - srttotime('1970-01-01 0:0:0') + 3600;

$claimSet = "{
   \"iss\":\"$clientId\",
   \"scope\":\"https://www.googleapis.com/auth/drive\",
   \"aud\":\"https://accounts.google.com/o/oauth2/token\",
   \"exp\":$exp,
   \"iat\":$ait
}";

$sigKey = "";

function encode($input){
	return base64_encode(serialize($input));
}

?>