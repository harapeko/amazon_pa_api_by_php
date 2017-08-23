# Usage

+ `composer install`
+ `cp config.php.example config.php` ←setting ※1
+ `php -S localhost:3000`
+ `open http://localhost:3000/?item=B0746FGCPH`

# Result

```json
{
    "result": "true",
    "asin": "B0746FGCPH",
    "title": "\u308d\u3093\u3050\u3089\u3044\u3060\u3041\u3059\uff01: 9 (REX\u30b3\u30df\u30c3\u30af\u30b9)",
    "author": "\u4e09\u5b85 \u5927\u5fd7",
    "manufacturer": "\u4e00\u8fc5\u793e",
    "item_url": "https:\/\/www.amazon.co.jp\/%E3%82%8D%E3%82%93%E3%81%90%E3%82%89%E3%81%84%E3%81%A0%E3%81%81%E3%81%99%EF%BC%81-9-REX%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E4%B8%89%E5%AE%85-%E5%A4%A7%E5%BF%97-ebook\/dp\/B0746FGCPH?SubscriptionId=AKIAJDKOQXGE3ZP2I43A&tag=ochigome-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B0746FGCPH",
    "image_url": "https:\/\/images-fe.ssl-images-amazon.com\/images\/I\/51mpR329-HL._SL160_.jpg"
}
```

# Attention

Dont publish `config.php` !!

# Via
- [PHPを使ってAmazonの商品情報をJSON形式で取得 | backport](https://backport.net/blog/2016/12/08/amazon_product_advertising_api/)

- [AmazonのProduct Advertising APIを使ってみる | cly7796.net ※1](http://cly7796.net/wp/php/try-using-product-advertising-api-of-amazon/)

- ./vendor/exeu/apai-io/samples/Lookup/SimpleLookup.php