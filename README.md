# test-parser-php

Parser searchs specified `keyword` on Amazon website, detects first product on search results page and loads it's properties: title, image url, price, description.


## Installation
```
git clone https://github.com/akstorm/test-parser-php.git
cd test-parser-php
composer install
php artisan serve
```


## Using example

`GET http://localhost:8000/api/v1/parser/amazon/my%20keyword`
