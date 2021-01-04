<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Dlgate_Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class Gate_CRUDControllerTest extends TestCase
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

    public function testGateUpdate(){
        //Gateテーブルのupdateが可能かどうか検証するメソッド

        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[1])->get();
        // updateするGateを用意
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        }

        $response = $this->actingAs(User::find(1))
        //ログイン
<<<<<<< HEAD
<<<<<<< HEAD
        ->put('/DLgate/update/add',[
=======
        ->put('/update/add',[
>>>>>>> test
=======
        ->put('/update/add',[
>>>>>>> frontend
            "Twitter_user"=>'Sankei_news',
            "tweet_id"=>'1337272952140623874',
            "gate_name"=>'sankei',
            "dl_url" =>'https://www.innovation.co.jp/',
            "URL_id" => $URL_id,
            ]);
        


        $response->assertStatus(302);
        $this->assertTrue(Auth::check());
        $this->assertDatabaseHas('dlgate_table', [
            "Twitter_user"=>'Sankei_news',
            "Twitter_tweet"=>'1337272952140623874',
            "gate_name"=>'sankei',
            "dl_url" =>'https://www.innovation.co.jp/',
            "URL_id" => $URL_id,
        ]);


    }
    public function testGateInsert(){
        //GateテーブルのInsertが可能かどうか検証するメソッド
        $response = $this->actingAs(User::find(1))
<<<<<<< HEAD
<<<<<<< HEAD
        ->post('/DLgate/insert',[
=======
        ->post('/insert',[
>>>>>>> test
=======
        ->post('/insert',[
>>>>>>> frontend
            "Twitter_user"=>'Sankei_news',
            "tweet_id"=>'1337272952140623874',
            "gate_name"=>'sankei',
            "dl_url" =>'https://www.innovation.co.jp/',
        ]);

        $this->assertTrue(Auth::check());
        $response->assertStatus(302);
        $this->assertDatabaseHas('dlgate_table', [
            "Twitter_user"=>'Sankei_news',
            "Twitter_tweet"=>'1337272952140623874',
            "gate_name"=>'sankei',
            "dl_url" =>'https://www.innovation.co.jp/',
        ]);
    }
    public function testGateDelete(){
        //Gateテーブルのdeleteが可能かどうか検証するメソッド
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[2])->get();
        // deleteするGateのURL_idを用意
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        }


        $response = $this->actingAs(User::find(1))
<<<<<<< HEAD
<<<<<<< HEAD
        ->delete('/DLgate/delete',[
=======
        ->delete('/delete',[
>>>>>>> test
=======
        ->delete('/delete',[
>>>>>>> frontend
            "URL_id"=>$URL_id,
        ]);

        $this->assertTrue(Auth::check());
        $response->assertStatus(302);
        $this->assertDatabaseMissing('dlgate_table',[
            "URL_id" => $URL_id,
            
        ]);

    }
}
