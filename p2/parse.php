<!DOCTYPE html>
<html>
<head>
    <title>Puthi OCR Client</title>

    <style>
        div {
            width: 720px;
            margin: 0 auto;
        }
    </style>

</head>
<body>
<div align="center">

<?php

require_once './unirest-php/src/Unirest.php';

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'submit') {
    $uploadUrl = "http://113.11.120.208/upload";
    $headers = array(
        "cache-control" => "no-cache",
        "postman-token" => "56897c8b-c2a9-34e3-3d77-7dd19f6c66a2");
    $data = array();
    $filePath = realpath($_FILES['file_upl']['name']);
    $file = array('sampleFile' => $filePath);
    $body = Unirest\Request\Body::multipart($data, $file);
    $response = Unirest\Request::post($uploadUrl, $headers, $body);
    $ocrUrl = 'http://113.11.120.208/do_ocr?src=' . $response->body;
    $response = Unirest\Request::get($ocrUrl);

    $json = json_decode($response->raw_body, true);
    echo $json['response'] . '<br><br>';
}
else {
    echo 'Please select a file to upload <br><br>';
}

?>

<form name="file_up" action="" method="POST" enctype="multipart/form-data">
<input type="file" name="file_upl" id="file_upl"/>
<input type="submit" name="action" value="submit"/>
</form>

</div>

</body>
</html>