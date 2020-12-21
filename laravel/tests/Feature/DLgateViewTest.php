<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Dlgate_Table;
use Illuminate\Http\Request as Request;

class DLgateViewTest extends TestCase
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


    public function testGateViewForm(){
        //dlgate_tableに登録したデータが表示されているかどうか検証するメソッド
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[3])->get();
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        }
        


        $response = $this->get('/DLgate/view?id='.$URL_id);

        $response->assertStatus(200);
        $response->assertDontSee('ダウンロードURLhttps://www.google.com');
    }

    public function testGate_Url_View(){
        // Gateの手順twitterフォロー等の手順が済んだらURLが出現するか検証するメソッド
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[3])->get();
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        }

        $response = $this->withSession([
            'Twitter_user_sucsess' => true,
            'Twitter_tweet_sucsess'=>true
            ])
        ->get('/DLgate/view?id='.$URL_id)
        ->assertSee('ダウンロードURLhttps://www.google.com');



    }
}
