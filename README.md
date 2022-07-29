# Project-s Title 
    Coin API

# Project Description
This project was designed for Company backend test.

Basically, we have two routes in api:
- '/coinPrice' - will return the current price for bitcoin, or other coins if you pass as a query parameter.
    
- '/historicalCoinPrice' - return the price of bitcoin specified in a date, you must pass the datetime(d-m-Y H:i:s) as query parameters, if you need the value of other coins, just pass its name as parameter.

After every request, if the response was completed and different empty, we record the return in coins table with Coin Model. Just make sure to pass the name with existing coin, check the [CoinGecko list](https://www.coingecko.com/en/api/documentation).

I was in doubt if I needed to record the return of coins/list , and check the parameter passed in the routes to retrieve the result for ETH, ATOM and LUNA, but how it is just 4 coins, I don't think the effort to save all list in database would be worth, just pass the correct coin name in parameter.

Talking about architecture decisions, I have tried to follow the Laravel Way, I separeted the logic in Service folder, which Controllers call for using [Service Container](https://laravel.com/docs/9.x/container#:~:text=The%20Laravel%20service%20container%20is,cases%2C%20%22setter%22%20methods.), and validating the query parameters using [Form Request Validation](https://laravel.com/docs/9.x/validation#form-request-validation).   

# How to install
## Requirements
        PHP 8
        Composer
        Docker

## Run 
> Clone the repository [coin-api](https://github.com/bruno-holanda15/coin-api)

> `composer install`

> `php artisan sail:install`

> `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`

> `sail up -d`
    
Used [Laravel Sail](https://laravel.com/docs/9.x/sail) to run Laravel with docker.


In this path `\request-docs` you can test the endpoints, thanks for library [rakutentech/laravel-request-docs](https://github.com/rakutentech/laravel-request-docs)

# Test
Create tests using Pest.

To access the tests in the project you need to run some commands.

> `sail artisan migrate --env=testing`

> `sail test`