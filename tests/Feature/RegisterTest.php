<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_success()
    {
        $data = [
            'email'     => 'test@gmail.com',
            'name'      => 'Test',
            'password'  => 'secret1234',
            'password_confirmation'  => 'secret1234'
        ];

        $response = $this->post('/api/register', $data);
        $response->assertStatus(201);
        User::where('email', 'test@gmail.com')->delete();
    }

    public function test_login_success()
    {
        $user = User::factory()->create();
        $data = [
            'email'     =>  $user->email,
            'password'  =>  'password'
        ];
        $response = $this->post('/api/login', $data);
        $response->assertStatus(200);
    }
}
