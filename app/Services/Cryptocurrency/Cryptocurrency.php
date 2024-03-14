<?php

namespace Services\Cryptocurrency;

use App\Http\Requests\StoreCryptocurrencyRequest;
use App\Messages;
use App\Models\Cryptocurrency as CryptocurrencyModel;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Cryptocurrency {
    public function __construct(
        private readonly CryptocurrencyModel $model
    ){}

    public function fetchAll(array $filters): array
    {
        $filters['start'] = 1;
        $filters['start'] = 5000;
        
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