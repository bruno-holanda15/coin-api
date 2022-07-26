Project-s Title 
    Coin API

Project Description
    This project was designed for Dacxi backend test.
    
    Basically, we have two routes in api:
    - '/coinPrice' - will return the current price for bitcoin, or other coins if you pass as a query parameter.
    
    - '/historicalCoinPrice' - return the price of bitcoin specified in a date, you must pass the datetime(d-m-Y H:i:s) as query parameters, if you need the value of other coins, just pass its name as parameter.

    After every request, if the response was completed, we record the return in coins table with Coin Model. Just make sure to pass the name with existing coin, check the CoinGecko list.
    I was in doubt if I needed to record the return of coins/list , and check the parameter passed in the routes to retrieve the result for DACXI, ETH, ATOM and LUNA, but how it is just 4 coins, I don't think the effort to save all list in database would be worth, just pass the correct coin name in parameter.

How to install
    Requirements
        PHP 8
        Composer
        Docker

    Run 
        composer install
        php artisan sail:install
        alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
        sail up -d
    
    Used https://laravel.com/docs/9.x/sail to run Laravel with docker

