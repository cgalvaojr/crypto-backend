<?php

namespace Services\Cryptocurrency;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\StreamInterface;

class Cryptocurrency {
    public function fetchAll(string $sort, string $sortOrder): array
    {
        try {
            $response = Http::acceptJson()
            ->withHeaders([
                'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_KEY')
            ])
            ->get(env('COINMARKETCAP_URL'), ['sort' => $sort, 'sort_dir' => $sortOrder,'start' => 1, 'limit' => 5000]);

            return $response->json();
        } catch(RequestException $exception) {
            report($exception);

            if ($exception->hasResponse()) {
                $response = $exception->getResponse();
                return $response->getBody();
            }
        }
    }
}