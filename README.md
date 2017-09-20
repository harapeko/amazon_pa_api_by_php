# Usage

+ `composer install`
+ `cp config.php.example config.php` ←setting ※1
+ `php -S localhost:3000`
+ `open http://localhost:3000/?item=B00HZV9XKU`

# Result

```json
{
    "status": "true",
    "title": "Amazonベーシック 高容量充電式ニッケル水素電池単4形4個パック(充電済み、最小容量 800mAh、約500回使用可能)",
    "author": "",
    "manufacturer": "AmazonBasics",
    "wish_url": "https://www.amazon.co.jp/gp/registry/wishlist/add-item.html?asin.0=B00HZV9XKU&SubscriptionId=AKIAJDKOQXGE3ZP2I43A&tag=ochigome-22&linkCode=xm2&camp=2025&creative=5143&creativeASIN=B00HZV9XKU",
    "tell_url": "https://www.amazon.co.jp/gp/pdp/taf/B00HZV9XKU?SubscriptionId=AKIAJDKOQXGE3ZP2I43A&tag=ochigome-22&linkCode=xm2&camp=2025&creative=5143&creativeASIN=B00HZV9XKU",
    "cr_url": "https://www.amazon.co.jp/review/product/B00HZV9XKU?SubscriptionId=AKIAJDKOQXGE3ZP2I43A&tag=ochigome-22&linkCode=xm2&camp=2025&creative=5143&creativeASIN=B00HZV9XKU",
    "item_url": "https://www.amazon.co.jp/gp/offer-listing/B00HZV9XKU?SubscriptionId=AKIAJDKOQXGE3ZP2I43A&tag=ochigome-22&linkCode=xm2&camp=2025&creative=5143&creativeASIN=B00HZV9XKU",
    "images": {
        "large": "https://images-fe.ssl-images-amazon.com/images/I/51VZTraNMPL.jpg",
        "medium": "https://images-fe.ssl-images-amazon.com/images/I/51VZTraNMPL._SL160_.jpg",
        "small": "https://images-fe.ssl-images-amazon.com/images/I/51VZTraNMPL._SL75_.jpg"
    }
}
```

# Attention

Dont publish `config.php` !!

# Via
- [PHPを使ってAmazonの商品情報をJSON形式で取得 | backport](https://backport.net/blog/2016/12/08/amazon_product_advertising_api/)

- [AmazonのProduct Advertising APIを使ってみる | cly7796.net ※1](http://cly7796.net/wp/php/try-using-product-advertising-api-of-amazon/)

- ./vendor/exeu/apai-io/samples/Lookup/SimpleLookup.php