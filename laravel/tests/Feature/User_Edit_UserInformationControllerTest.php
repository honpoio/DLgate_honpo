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
<<<<<<< HEAD
        $dlgate_table = User::select(['id'])->where('id',[2])->get();
=======
        $dlgate_table = User::select(['id'])->where('id',[1])->get();
>>>>>>> test
        // updateするGateのカラムidのフィールドを用意
        foreach($dlgate_table as $row){
            $id = $row->id;
        }

<<<<<<< HEAD
        $response = $this->actingAs(User::find(2))
=======
        $response = $this->actingAs(User::find(1))
>>>>>>> test
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

<<<<<<< HEAD
        $dlgate_table = User::select(['id','password'])->where('id',[2])->get();
=======
        $dlgate_table = User::select(['id','password'])->where('id',[1])->get();
>>>>>>> test
        // updateするGateのカラムidのフィールドを用意

        foreach($dlgate_table as $row){
            $id = $row->id;
            $password = $row->password;
        }
        
<<<<<<< HEAD
        $response = $this->actingAs(User::find(2))
=======
        $response = $this->actingAs(User::find(1))
>>>>>>> test
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
<<<<<<< HEAD
    $dlgate_table = User::select(['id','name'])->where('id',[2])->get();
=======
    $dlgate_table = User::select(['id','name'])->where('id',[1])->get();
>>>>>>> test

    foreach($dlgate_table as $row){
        $id = $row->id;
        $name = $row->name;
    }

<<<<<<< HEAD
    $response = $this->actingAs(User::find(2))
=======
    $response = $this->actingAs(User::find(1))
>>>>>>> test
    ->post('/user/edit/Withdrawal',[
        "CurrentPassword" => 'testpass',
        "UserId" => $id,
    ]);
    //users,dlgate_table,gate_usersと同じnameを持つカラムを削除

    $response->assertStatus(302)
    ->assertRedirect('/');
    $this->assertFalse(Auth::check());

    $this->assertDatabaseMissing('users', [
<<<<<<< HEAD
        "id" => $id,
    ]);
    $this->assertDatabaseMissing('dlgate_table', [
        "user_id" => $id,
    ]);
=======
        "name" => $name,
    ]);
    $this->assertDatabaseMissing('dlgate_table', [
        "name" => $name,
    ]);

    $this->assertDatabaseMissing('gate_users', [
        "user" => $name,
    ]);

>>>>>>> test
    }
}
