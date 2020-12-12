<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Dlgate_Table;
use Illuminate\Support\Facades\Auth;
class CRUDControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testGateUpdate(){
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[1])->get();
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        }

        $response = $this->actingAs(User::find(1))
        ->put('/update/add',[
            "Twitter_user"=>'Sankei_news',
            "tweet_id"=>'1337272952140623874',
            "gate_name"=>'sankei',
            "dl_url" =>'https://www.innovation.co.jp/',
            ]);


        $this->assertTrue(Auth::check());
        $response->assertStatus(302);

    }
}
