<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCustomerLogin()
    {
        $response = $this->post('api/login/customer', [
            "email" => "balistreri.antwon@macejkovic.com",
            "password" => "secret"
        ]);
        $response->assertStatus(200);
    }

    public function testProdukApi()
    {
      $response = $this->get('api/produk/all');
      $response->assertStatus(200);
    }
}
