<?php
require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Client.php";
require_once "/var/www/oa2019/config/google-api-php-bng/src/Google/Service/Drive.php";

function printFile($service, $fileId) {
  try {
    $file = $service->files->get($fileId);

    print "Title: " . $file->getTitle();
    print "Description: " . $file->getDescription();
    print "MIME type: " . $file->getMimeType();
  } catch (Exception $e) {
    print "An error occurred: " . $e->getMessage();
  }
}

function downloadFile($service, $file) {
  $downloadUrl = $file->getDownloadUrl();
  if ($downloadUrl) {
    $request = new Google_Http_Request($downloadUrl, 'GET', null, null);
    $httpRequest = Google_Client::$io->authenticatedRequest($request);
    if ($httpRequest->getResponseHttpCode() == 200) {
      return $httpRequest->getResponseBody();
    } else {
      echo 'Error: HTTP ' + $httpRequest->getResponseHttpCode();
      return null;
    }
  } else {
	  echo 'File not existent on Drive';
    // The file doesn't have any content stored on Drive.
    return null;
  }
};

?>