<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Dlgate_Table;

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


    public function testGateLoginViewForm(){
        //dlgate_tableに登録したデータが表示されているかどうか検証するメソッド
        $dlgate_table = Dlgate_Table::select(['URL_id'])->where('id',[3])->get();
        foreach($dlgate_table as $row){
            $URL_id = $row->URL_id;
        }

        $response = $this->get('testDLgate?id='.$URL_id);

        $response->assertStatus(200);
    }
}
