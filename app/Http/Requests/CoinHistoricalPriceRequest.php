<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CoinHistoricalPriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'coin' => $this->query('coin') ?? 'bitcoin',
            'date' => $this->query('date'),
            'limit_date' => Carbon::now()->format('d-m-Y')
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'coin' => [
                'required',
                'string'
            ],
            'date' => [
                'required',
                'date_format:d-m-Y H:i:s',
                "before:limit_date"
            ]
        ];
    }
}
