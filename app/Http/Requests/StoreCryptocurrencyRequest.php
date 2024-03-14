<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCryptocurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'symbol' => 'required|max:20',
            'cmc_rank' => 'required|integer',
            'market_cap' => 'required|numeric',
            'price' => 'required|numeric',
            'volume_24h' => 'required|numeric',
            'percent_change_24h' => 'required|numeric'
        ];
    }
}
