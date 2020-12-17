<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Dlgate_Table;
use Illuminate\Support\Facades\Auth;

class Gate_CRUDControllerLoginTest extends TestCase
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

    public function testGateLoginForm(){
        // 　/Dlgateでログインの有無を検証する

        $this->get('DLgate')->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/DLgateにアクセスする


        $response = $this->actingAs(User::find(1))
        ->get('DLgate');
            
        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('DLgate');

        
    }
    public function testGateLoginUpdateForm(){
        // /Dlgate/update?URL_id=(URL_id)のログインの有無を検証

        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[1])->get();
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        //動的パスのupdate?URL_id={}を取得
        }

        $this->get('update?URL_id='.$URL_id)->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/DLgateにアクセスする

        $response = $this->actingAs(User::find(1))
        ->get('update?URL_id='.$URL_id);
        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('DLgate_update');
    }
    
    public function testGateLoginInsertForm(){
        //DLgate/createパスのログイン有無を検証

        $this->get('DLgate/create')->assertRedirect('login')->assertStatus(302);

        $response = $this->actingAs(User::find(1))
        ->get('DLgate/create');
            
        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
        ->assertViewIs('DLgate_create');
    }
    public function testGateLoginviewForm(){
        // ルーティングDLgate/viewはログインしていない状態でのアクセスが可能か検証
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[1])->get();
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        //動的パスのDLgate/view={}を取得
        }
        $this->get('/DLgate/view?id='.$URL_id)->assertViewIs('DLgateForm')->assertStatus(200);
        
    }

    
}
