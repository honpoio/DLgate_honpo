<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;
class User_Edit_UserInformationControllerLoginTest extends TestCase
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
        // 　/userパスのログインの有無を検証する
        $this->get('user')->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/userにアクセスする

        $response = $this->actingAs(User::find(1))
        //ログインした状態で/userにアクセス
        ->get('user');
        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('auth.UserInformationEdit');
    }
    public function testWithdrawalForm(){
        // 　/user/edit/deleteパスのログインの有無を検証する
        $this->get('/user/edit/delete')->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/user/edit/deleteにアクセス

        $response = $this->actingAs(User::find(1))
        ->get('/user/edit/delete');
        //ログインした状態で/user/edit/deleteにアクセス

        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('auth.WithdrawalForm');


    }
}
