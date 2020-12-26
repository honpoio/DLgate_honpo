<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Dlgate_Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class User_Edit_UserInformationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use WithoutMiddleware;
    use RefreshDatabase;
    
    public function setUp() :void
    {   
        parent::setUp(); 
        $this->seed('usersTableSeeder');
        $this->seed('dlgate_tableSeeder');
    }

    public function testEmailUpdate()
    {
        // Emailのフィールドがupdateできるか検証
        $dlgate_table = User::select(['id'])->where('id',[1])->get();
        // updateするGateのカラムidのフィールドを用意
        foreach($dlgate_table as $row){
            $id = $row->id;
        }

        $response = $this->actingAs(User::find(1))
        ->post('/user/edit/email',[
            "Email" => 'hogehoge@gmail.com',
            "UserId" => $id,
        ]);
        //Emailカラムのフィールドをアップデート

        $response->assertStatus(302)
        ->assertRedirect('/email/verify');

        $this->assertTrue(Auth::check());
        
        $this->assertDatabaseHas('users', [
            "Email" => 'hogehoge@gmail.com',
        ]);
    }
    public function testPasswordChange(){
        // passwordのフィールドがupdateできるか検証

        $dlgate_table = User::select(['id','password'])->where('id',[1])->get();
        // updateするGateのカラムidのフィールドを用意

        foreach($dlgate_table as $row){
            $id = $row->id;
            $password = $row->password;
        }
        
        $response = $this->actingAs(User::find(1))
        ->post('/user/edit/password',[
            "CurrentPassword" => 'testpass',
            "newPassword" =>'loginsimasuyo',
            "newPassword_confirmation" => 'loginsimasuyo',
            "UserId" => $id,
        ]);
        //passwordカラムのフィールドをアップデート

        $response->assertStatus(302)
        ->assertRedirect('/user');
        $this->assertTrue(Auth::check());
        $this->assertDatabaseMissing('users', [
            "password" => $password,
        ]);
    }
    public function testWithdrawal(){
    // 退会できるか検証
    $dlgate_table = User::select(['id','name'])->where('id',[1])->get();

    foreach($dlgate_table as $row){
        $id = $row->id;
        $name = $row->name;
    }

    $response = $this->actingAs(User::find(1))
    ->post('/user/edit/Withdrawal',[
        "CurrentPassword" => 'testpass',
        "UserId" => $id,
    ]);
    //users,dlgate_table,gate_usersと同じnameを持つカラムを削除

    $response->assertStatus(302)
    ->assertRedirect('/');
    $this->assertFalse(Auth::check());

    $this->assertDatabaseMissing('users', [
        "id" => $id,
    ]);
    $this->assertDatabaseMissing('dlgate_table', [
        "user_id" => $id,
    ]);
    }
}
