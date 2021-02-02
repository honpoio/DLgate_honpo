<?php declare(strict_types=1);

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function testExample(): void
    {
        $this->seed('usersTableSeeder');
        $this->seed('DlgatesTableSeeder');

        $response = $this
            ->actingAs(User::find(1))
            ->get(route('home'));
        // var_dump($this);

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('ログインしました！');
    }
}
