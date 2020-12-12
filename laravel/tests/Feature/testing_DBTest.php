<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
class testing_DBTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function create()
    // {
    //     return view('DLgate_create');
    // }
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);

    // }
    /**
     * @dataProvider testFuncProvider
     */
    public function testsetUp(): void
    {
        // Artisan::call('cache:clear');
        // Artisan::call('config:clear');
        Artisan::call('migrate:refresh');

        parent::setUp();
        $this->seed('usersTableSeeder');
        $this->seed('dlgate_tableSeeder'); 

        // dd(env('APP_ENV'), env('DB_DATABASE'), env('APP_URL'),env('DB_PORT'));  
    }


}
