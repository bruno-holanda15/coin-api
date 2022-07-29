<?php

use function Pest\Faker\faker;

test('can request CoinGecko API', function () {
    $this->get('/api/coinPrice')->assertStatus(200);
});

test('can return bitcoin price', function () {
    $response = $this->get('/api/coinPrice');
    $this->assertEquals('bitcoin', $response['coin']);
    $this->assertIsNumeric($response['value']);
});

test('can return other coins', function () {
    $coin = faker()->randomElement(['chainlink', 'ethereum' ,'terra-luna', 'chiliz']);
    $response = $this->get('/api/coinPrice?coin=' . $coin)->assertStatus(200);
    $this->assertIsNumeric($response['value']);
});

test('cannot return request for incorrect coin', function (){
    $this->get('/api/coinPrice?coin=bitfalse')->assertStatus(400);
});