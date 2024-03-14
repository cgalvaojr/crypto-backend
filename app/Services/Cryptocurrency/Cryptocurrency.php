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

    public function fetchAll(string $sort, string $sortOrder): array
    {

        $response = Http::acceptJson()->withHeaders([
                'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_KEY')
        ])
        ->get(env('COINMARKETCAP_URL'), ['sort' => $sort, 'sort_dir' => $sortOrder,'start' => 1, 'limit' => 5000]);

        return $response->json();
    }

    public function store(array $criptoCurrencyData): CryptocurrencyModel
    {
        return $this->model->updateOrCreate(['name' => $criptoCurrencyData['name']], $criptoCurrencyData);
    }
}