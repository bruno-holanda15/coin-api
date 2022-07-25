<?php

namespace App\Services;

use App\Models\Coin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CoinService
{
    CONST baseUrl = 'https://api.coingecko.com/api/v3';
    CONST vs_currencie = 'usd';

    public function getCurrentPrice(array $data)
    {
        $response = Http::get(self::baseUrl . '/simple/price', [
            'ids' => $data['coin'],
            'vs_currencies' => self::vs_currencie
        ]);

        if ($response->failed() || empty($response->json()))
            return ['coin' => 'Coin not found'];

        $coin = [
            'coin' => $data['coin'],
            'value' => $response[$data['coin']][self::vs_currencie],
            'date_searched' => Carbon::now()
        ];
        Coin::create($coin);

        return $coin;
    }

    public function getHistoricalPrice(array $data)
    {
        $response = Http::get(self::baseUrl . "/coins/{$data['coin']}/history", [
            'ids' => $data['coin'],
            'date' => $data['date'],
            'localization' => 'false'
        ]);

        if ($response->failed() || empty($response->json()))
            return ['coin' => 'Coin not found'];

        $coin = [
            'coin' => $data['coin'],
            'value' => $response['market_data']['current_price'][self::vs_currencie],
            'date_searched' => Carbon::make($data['date'])->format('Y-m-d H:i:s')
        ];
        Coin::create($coin);

        return $coin;
    }
}