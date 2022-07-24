<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoinCurrentPriceRequest extends FormRequest
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
            'coin' => $this->query('coin') ?? 'bitcoin'
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
                'string'
            ]
        ];
    }
}
