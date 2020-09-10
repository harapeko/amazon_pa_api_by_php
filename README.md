# Usage

+ `config.php` ←setting ※1
+ `php -S localhost:3000`
+ `open http://localhost:3000/?item=B00HZV9XKU`

# Result

```json
{
    "title":"Amazon\u30d9\u30fc\u30b7\u30c3\u30af \u5145\u96fb\u6c60 \u9ad8\u5bb9\u91cf\u5145\u96fb\u5f0f\u30cb\u30c3\u30b1\u30eb\u6c34\u7d20\u96fb\u6c60\u53584\u5f624\u500b\u30bb\u30c3\u30c8 (\u5145\u96fb\u6e08\u307f\u3001\u6700\u5c0f\u5bb9\u91cf 800mAh\u3001\u7d04500\u56de\u4f7f\u7528\u53ef\u80fd)",
    "item_url":"https:\/\/www.amazon.co.jp\/dp\/B00HZV9XKU?tag=ochitegome-22&linkCode=ogi&th=1&psc=1",
    "images":{
        "large":"https:\/\/m.media-amazon.com\/images\/I\/41HHTZPk8TL.jpg",
        "medium":"https:\/\/m.media-amazon.com\/images\/I\/41HHTZPk8TL._SL160_.jpg",
        "small":"https:\/\/m.media-amazon.com\/images\/I\/41HHTZPk8TL._SL75_.jpg"
    },
    "price":"\uffe5898",
    "is_prime":true
}
```

# Ref
- `GetItems` of [Product Advertising API 5.0 Scratchpad](https://webservices.amazon.co.jp/paapi5/scratchpad)