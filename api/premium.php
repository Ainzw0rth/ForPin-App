<?php

require '../app/models/Premium_model.php';
require '../app/core/Database.php';
require_once '../app/config/config.php';

// request to SOAP
$premiumModel = new Premium_model();
$APIkey = getenv('SOAP_API_KEY');
$soap_url = getenv('SOAP_URL');
$app_address = getenv('APP_ADDRESS');


if (isset($_POST)) {
    $creator_id = $_POST['creator_username'];
    $curr_date = $_POST['curr_date'];
    
    $soap_service_url = $soap_url . '/premium?wsdl';
    
    $request_body = '<?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
    <newPremiumUser xmlns="http://interfaces/">
    <creator_username>' . $creator_id . '</creator_username>
    </newPremiumUser>
    </soap:Body>
    </soap:Envelope>';
    
    $headers = array(
        'Authorization: ' . $APIkey,
        'Content-Type: "text/xml"',
        'X-Forwarded-For: ' . $app_address,
        'Date: ' . $curr_date
    );
    
    $channel = curl_init();
    curl_setopt($channel, CURLOPT_POST, true);
    curl_setopt($channel, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($channel, CURLOPT_POSTFIELDS, $request_body);
    curl_setopt($channel, CURLOPT_URL, $soap_service_url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($channel);
    
    if ($response === FALSE) {
        printf("CURL error (#%d): %s<br>\n", curl_error($channel),
        htmlspecialchars(curl_error($channel)));
    }
    
    curl_close($channel);
    
    $xmlDOC = new DOMDocument();
    $xmlDOC->loadXML($response);
    $xmlObject = $xmlDOC->documentElement;
    $status = $xmlObject->nodeValue;

    if ($status == 'true') {
        try {
            $premiumModel->addPremiumUser($creator_id);
            http_response_code(201);
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
}