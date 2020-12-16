<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;
class User_Edit_LoginUserInformationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp() :void
    {   
        parent::setUp(); 
        $this->seed('usersTableSeeder');
        $this->seed('dlgate_tableSeeder');
    }

    public function testUserInformation(){
        $this->get('user')->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/Userにアクセスする

        $response = $this->actingAs(User::find(1))
        ->get('user');
            
        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('auth.UserInformationEdit');
    }
    public function testWithdrawalForm(){
        $this->get('/user/edit/delete')->assertRedirect('login')->assertStatus(302);

        $response = $this->actingAs(User::find(1))
        ->get('/user/edit/delete');

        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('auth.WithdrawalForm');


    }
}
