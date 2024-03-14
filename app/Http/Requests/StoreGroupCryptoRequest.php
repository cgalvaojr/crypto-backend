<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupCryptoRequest extends FormRequest
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
            'groupId' => 'required|integer',
            'cryptos.*.name' => 'required|max:50',
            'cryptos.*.symbol' => 'required|max:20',
            'cryptos.*.cmc_rank' => 'required|integer',
            'cryptos.*.market_cap' => 'required|numeric',
            'cryptos.*.price' => 'required|numeric',
            'cryptos.*.volume_24h' => 'required|numeric',
            'cryptos.*.percent_change_24h' => 'required|numeric'
        
        ];
    }
}
