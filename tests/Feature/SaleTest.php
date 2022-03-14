<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Sale;
use App\Models\Item;
use App\Models\Client;

class SaleTest extends TestCase
{
    protected $endpoint = "/api/sale";

    public function test_get_all_sales()
    {
        $response   = $this->actingAs(User::factory()->create(), 'api')->get($this->endpoint);
        $response->assertStatus(200);
    }

    public function test_create_sale()
    {
        $item = Item::factory()->create();
        $client = Client::factory()->create();
        $data = [
            'item_id' => $item->id,
            'client_id' => $client->id,
            'qty' => 1
        ];
        $response = $this->actingAs(User::factory()->create(), 'api')->post($this->endpoint, $data);
        $response->assertStatus(201);
    }


    public function test_update_sale()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();
        $client = Client::factory()->create();

        // create dummy data
        $saleDataParams = [
            'item_id' => $item->id,
            'client_id' => $client->id,
            'qty' => 1
        ];
        $sale = $this->actingAs($user, 'api')->post($this->endpoint, $saleDataParams);
        $result = json_decode($sale->getContent(), true);

        // update with new paramaters
        $newParams = [
            'item_id' => $item->id,
            'client_id' => $client->id,
            'qty' => 10
        ];

        $response = $this->actingAs($user, 'api')->put($this->endpoint . '/' . $result['data']['id'], $newParams);
        $response->assertStatus(200);
    }


    public function test_delete_sale()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();
        $client = Client::factory()->create();
        // create dummy data
        $saleDataParams = [
            'item_id' => $item->id,
            'client_id' => $client->id,
            'qty' => 1
        ];
        $sale = $this->actingAs($user, 'api')->post($this->endpoint, $saleDataParams);
        $result = json_decode($sale->getContent(), true);
        $response = $this->actingAs($user, 'api')->delete($this->endpoint . '/' . $result['data']['id']);
        $response->assertStatus(200);
    }
}
