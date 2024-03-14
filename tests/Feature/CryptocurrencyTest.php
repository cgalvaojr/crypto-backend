<?php

namespace Tests\Feature;

use App\Models\Cryptocurrency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CryptocurrencyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_fetch_all_cryptos(): void
    {
        $response = $this->get('/api/cryptocurrency');
        $response->assertStatus(200);
    }

    public function test_store_crypto(): void
    {
        $payload = $this->getCryptoPayload();
        $response = $this->post('/api/cryptocurrency', $payload);
        $this->assertDatabaseHas('cryptocurrency', $payload);
    }

    public function test_update_crypto(): void
    {
        $payload = $this->getCryptoPayload();
        $this->post('/cryptocurrency', $payload);
        $this->assertDatabaseHas('cryptocurrency', $payload);

        $payload["symbol"] = "XRP";
        $this->post('/cryptocurrency', $payload);
        $this->assertDatabaseMissing('cryptocurrency', $payload);
    }

    private function getCryptoPayload(): array
    {
        return [
            "name" => "uchw6uyi0yo",
            "symbol" => "1sxi3co54kx",
            "cmc_rank" => 9775,
            "price" => 0.10654987,
            "volume_24h" => 0.7634083721937082,
            "percent_change_24h" => 0.8901348036759258,
            "market_cap" => 0.33948856636541724,
        ];
    }
}
