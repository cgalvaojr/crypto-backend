<?php

namespace Tests\Feature;

use App\Models\Cryptocurrency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupsTest extends TestCase
{
    const API_ENDPOINT = '/api/groups';
    public function test_fetch_all_groups(): void
    {
        $response = $this->get('/api/groups');
        $response->assertStatus(200);
    }

    public function test_fetch_group_with_crypto():void
    {
        
    }

    public function test_store_group(): void
    {
        $payload = $this->getGroupPayload();
        $response = $this->post(self::API_ENDPOINT, $payload);
        $this->assertDatabaseHas('group', $payload);
    }

    public function test_update_group(): void
    {
        $payload = $this->getGroupPayload();
        $this->post(self::API_ENDPOINT, $payload);
        $this->assertDatabaseHas('group', $payload);

        $payload["name"] = "new name";
        $this->post(self::API_ENDPOINT, $payload);
        $this->assertDatabaseHas('group', $payload);
    }

    private function getGroupPayload(): array
    {
        return [
            "name" => "My Group"
        ];
    }
}