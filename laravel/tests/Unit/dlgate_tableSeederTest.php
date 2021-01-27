<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use App\Dlgate;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class dlgate_tableSeederTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    private static $Dlgate_Table_Name = [];
    //Dlgate_Tableのカラムnameを格納
    private static $User_Table_Name=[];
    //Userテーブルのカラムnameを格納


    private function DLgate_Extraction_Name($name){
        //DLgateテーブルのnameカラムを抽出するメソッド
        array_push(self::$Dlgate_Table_Name,$name);
    }

    private function User_Extraction_Name($name){
        //Userテーブルのnameカラムを抽出するメソッド
        array_push(self::$User_Table_Name,$name);
    }

    private function Array_Unique_Delete(){
        //DBから一意のデータを削除するメソッド
        self::$Dlgate_Table_Name = array_values(array_unique(self::$Dlgate_Table_Name));
    }


    use RefreshDatabase;

    public function setUp() :void
    {   
        parent::setUp(); 
        $this->seed('usersTableSeeder');
        $this->seed('dlgate_tableSeeder');
    }

    public function testDLgate_TableSeeder(){
        // DLgate_tableに追加したseederのデータを検証するメソッド

        $Dlgate_Table = Dlgate::all();
        foreach($Dlgate_Table as $row){
            $this->DLgate_Extraction_Name($row["name"]);
        }
        $this->Array_Unique_Delete();

        $this->assertEquals(7, count($Dlgate_Table));
        // seederに挿入したデータの総数に間違えがないかどうか検証

        $Usertest_add_Dlgate_Table = Dlgate::where('user_id', '1')->get();
        $this->assertEquals(4, count($Usertest_add_Dlgate_Table));
        //seederで挿入したtestユーザーのgate総数を検証

        $Usertest2_add_Dlgate_Table = Dlgate::where('user_id', '2')->get();
        $this->assertEquals(3, count($Usertest2_add_Dlgate_Table));
        //seederで挿入したtest2ユーザーのgate総数を検証
        return self::$Dlgate_Table_Name;
    }
    public function testUser_TableSeeder(){
        //Userテーブルに追加したseederのデータを検証するメソッド
        $user = User::all();
        foreach($user as $row){
            $this->User_Extraction_Name($row["name"]);
        }
        $this->assertEquals(2, count($user));
        // seederに挿入したデータの総数に間違えがないかどうか検証
        
        $User_Email_Add = User::where('email','test@exmple.com')->get();
        foreach($User_Email_Add as $_User_Email_Add){
            //seederで追加したデータ
            $this->assertEquals('test',$_User_Email_Add["name"]);
            $this->assertEquals('test@exmple.com',$_User_Email_Add["email"]);
            $this->assertEquals('2020-12-09 14:40:35',$_User_Email_Add["email_verified_at"]);
        }
        return self::$User_Table_Name;
    }

}
