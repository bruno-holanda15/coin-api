<?php

namespace App\Services;

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

        return [
            'coin' => $data['coin'],
            'value' => $response[$data['coin']][self::vs_currencie],
            'date' => Carbon::now()
        ];
    }

    public function getHistoricalPrice(array $data)
    {
        $response = Http::get(self::baseUrl . "/coins/{$data['coin']}/history", [
            'ids' => $data['coin'],
            'date' => $data['date'],
            'localization' => 'false'
        ]);

        return [
            'coin' => $data['coin'],
            'value' => $response['market_data']['current_price'][self::vs_currencie],
            'date' => $data['date']
        ];
    }
}