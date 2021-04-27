<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function test_url_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_url_signin()
    {
        $response = $this->get('/signin');
        $response->assertStatus(200);
    }

    public function test_url_signin_form()
    {
        $response = $this->post('/signin');
        $response->assertStatus(302);

    }

}
