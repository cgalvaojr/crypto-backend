<?php

namespace Services\Cryptocurrency;

use App\Models\Cryptocurrency as CryptocurrencyModel;
use Illuminate\Support\Facades\Http;

class Cryptocurrency {
    const API_START_RESULT = 1;
    const API_NUM_RESULTS = 5000;
    public function __construct(
        private readonly CryptocurrencyModel $model
    ){}

    public function fetchAll(array $filters): array
    {
        $filters['start'] = self::API_START_RESULT;
        $filters['limit'] = self::API_NUM_RESULTS;

        $response = Http::acceptJson()->withHeaders([
                'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_KEY')
        ])
        ->get(env('COINMARKETCAP_URL'), $filters);

        return $response->json();
    }

    public function store(array $criptoCurrencyData): CryptocurrencyModel
    {
        return $this->model->updateOrCreate(['name' => $criptoCurrencyData['name']], $criptoCurrencyData);
    }

    public function fetch(int $cryptocurrencyId)
    {
        return $this->model->find($cryptocurrencyId);
    }
}