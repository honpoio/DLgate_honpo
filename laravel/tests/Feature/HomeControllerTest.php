<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->get(route('home'));
            // var_dump($this);

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('ログインに成功しました！');
    }
}
