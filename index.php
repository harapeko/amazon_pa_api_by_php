<?php

require_once "config.php";
require_once "paapi5.php";

$itemId = $_GET['item'];

$serviceName="ProductAdvertisingAPI";
$region="us-west-2";
$accessKey=AMZN_ACCESS_KEY;
$secretKey=AMZN_SECRET_KEY;
$payload="{"
        ."  \"ItemIds\": ["
        ."  \"${itemId}\""
        ." ],"
        ." \"Resources\": ["
        ."  \"BrowseNodeInfo.BrowseNodes\","
        ."  \"Images.Primary.Small\","
        ."  \"Images.Primary.Medium\","
        ."  \"Images.Primary.Large\","
        ."  \"ItemInfo.Title\","
        ."  \"Offers.Listings.DeliveryInfo.IsPrimeEligible\","
        ."  \"Offers.Listings.Price\""
        ." ],"
        ." \"PartnerTag\": \"" . "ochitegome-22" . "\","
        ." \"PartnerType\": \"Associates\","
        ." \"Marketplace\": \"www.amazon.co.jp\""
        ."}";
$host="webservices.amazon.co.jp";
$uriPath="/paapi5/getitems";
$awsv4 = new AwsV4 ($accessKey, $secretKey);
$awsv4->setRegionName($region);
$awsv4->setServiceName($serviceName);
$awsv4->setPath ($uriPath);
$awsv4->setPayload ($payload);
$awsv4->setRequestMethod ("POST");
$awsv4->addHeader ('content-encoding', 'amz-1.0');
$awsv4->addHeader ('content-type', 'application/json; charset=utf-8');
$awsv4->addHeader ('host', $host);
$awsv4->addHeader ('x-amz-target', 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.GetItems');
$headers = $awsv4->getHeaders ();
$headerString = "";

foreach ( $headers as $key => $value ) {
    $headerString .= $key . ': ' . $value . "\r\n";
}
$params = array (
        'http' => array (
                'header' => $headerString,
                'method' => 'POST',
                'content' => $payload
        )
);
$stream = stream_context_create ( $params );

$fp = @fopen ( 'https://'.$host.$uriPath, 'rb', false, $stream );

if (! $fp) {
    throw new Exception ( "Exception Occured" );
}
$response = @stream_get_contents ( $fp );
if ($response === false) {
    throw new Exception ( "Exception Occured" );
}

$item = json_decode($response)->ItemsResult->Items[0];

echo json_encode([
    "title" => $item->ItemInfo->Title->DisplayValue,
    "item_url" => $item->DetailPageURL,
    "images" => [
        "large"  => $item->Images->Primary->Large->URL,
        "medium" => $item->Images->Primary->Medium->URL,
        "small"  => $item->Images->Primary->Small->URL,
    ],
    "price" => $item->Offers->Listings[0]->Price->DisplayAmount,
    "is_prime" => !!$item->Offers->Listings[0]->DeliveryInfo->IsPrimeEligible,
]);
