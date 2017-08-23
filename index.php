<?php
require_once "vendor/autoload.php";
require_once "config.php";

const RETRY_COUNT = 5;
const RETRY_SLEEP_SEC = 10;
const RESULT_ERROR_JSON = '{ "status": false }';

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Lookup;

// BEGIN
$conf = new GenericConfiguration();
$client = new \GuzzleHttp\Client();
$request = new \ApaiIO\Request\GuzzleRequest($client);

$itemId = $_GET['item'];

// ASIN IDがないならエラーを返す
if (!$itemId) {
  $result = RESULT_ERROR_JSON;

// ASIN IDがあるとき、APIを叩く
} else {
  // 取得処理
  $item = getItem($itemId);

  // なければエラーを返す
  if (!$item) {
    $result = RESULT_ERROR_JSON;

  // あればJSONにパースする
  } else {
    $result = toJson($item);
  }
}

header('Content-Type: application/json');
echo $result;
// END

/**
 * AmazonのProduct Advertising APIから商品データを返す
 *
 * @param  string $itemID ASIN
 * @return object $item   商品データ
 */
function getItem($itemId) {
  $item = NULL;
  $conf = new GenericConfiguration();
  $client = new \GuzzleHttp\Client();
  $request = new \ApaiIO\Request\GuzzleRequest($client);

  // config
  $conf->setCountry('co.jp')
    ->setAccessKey(AWS_API_KEY)
    ->setSecretKey(AWS_API_SECRET_KEY)
    ->setAssociateTag(AWS_ASSOCIATE_TAG)
    ->setRequest($request);

  $apaiIO = new ApaiIO($conf);
  $lookup = new Lookup();
  $lookup->setItemId($itemId);
  $lookup->setResponseGroup(array('Images', 'Small'));


  // Product Advertising APIの制限で503になることがあるので失敗したらリトライする
  for ($i = 0 ; $i < RETRY_COUNT; $i++) {
    try {
      $res = $apaiIO->runOperation($lookup);
      $results = simplexml_load_string($res);

      if ($results->Items->Request->IsValid) {
        $item = $results->Items->Item[0];
      }
      break; // APIからレスポンスが返ってきたら成否を問わず処理打ち切る

    } catch (Exception $e) {
      sleep(RETRY_SLEEP_SEC); // リトライの前に一定時間待つ
    }
  }

  return $item;
}


/**
 * アイテムから必要な情報を抜き出してJSON形式返す
 *
 * @param object $item
 * @return object
 */
 function toJson($item) {
  $array = [
    "status"       => 'true',
    "asin"         => (string) $item->ASIN,
    "title"        => (string) $item->ItemAttributes->Title,
    "author"       => (string) $item->ItemAttributes->Author,
    "manufacturer" => (string) $item->ItemAttributes->Manufacturer,
    "item_url"     => (string) $item_url = $item->DetailPageURL,
    "image_url"    => (string) $item->MediumImage->URL,
  ];

  return json_encode($array);
}