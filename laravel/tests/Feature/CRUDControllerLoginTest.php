<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Dlgate_Table;
use Illuminate\Support\Facades\Auth;

class CRUDControllerLoginTest extends TestCase
{
    private $URL_id;



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
        // 　/Dlgateでログインしたか検証する
        $response = $this->actingAs(User::find(1))
        ->get('DLgate');
            
        $this->assertTrue(Auth::check());
        $response->assertStatus(200);
    }
    public function testGateLoginUpdateForm(){
        // /Dlgate/update?URL_id=(URL_id)を検証
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[1])->get();
        foreach($dlgate_table as $row){
            $this->URL_id = $row->URL_id;
        }
        
        $response = $this->actingAs(User::find(1))
        ->get('update?URL_id='.$this->URL_id);


        $this->assertTrue(Auth::check());
        $response->assertStatus(200);

    }
}
