<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CoinCurrentPriceRequest, CoinHistoricalPriceRequest};
use App\Services\CoinService;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function __construct(private CoinService $service)
    {
    }

    public function show(CoinCurrentPriceRequest $request)
    {
        return $this->service->getCurrentPrice($request->validated());
    }

    public function showHistoricalPrice(CoinHistoricalPriceRequest $request)
    {
        return $this->service->getHistoricalPrice($request->validated());
    }
}
