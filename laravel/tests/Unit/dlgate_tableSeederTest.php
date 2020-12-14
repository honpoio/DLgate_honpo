<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use App\Dlgate_Table;
use App\User;
use App\GateUser;
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

    private function DLgate_add_name($name){

        array_push(self::$Dlgate_Table_Name,$name);
    }

    private function User_Add_Name($name){
        array_push(self::$User_Table_Name,$name);
    }

    private function Array_Unique_Delete(){
        self::$Dlgate_Table_Name = array_values(array_unique(self::$Dlgate_Table_Name));
    }


    public function testDLgate_TableSeeder(){

        $Dlgate_Table = Dlgate_Table::all();
        foreach($Dlgate_Table as $row){
            $this->DLgate_add_name($row["name"]);
        }
        $this->Array_Unique_Delete();

        //名前の重複を許可しているので一意の名前を削除し番号を振り分け直す

        $this->assertEquals(6, count($Dlgate_Table));
        // seederに挿入したデータの総数に間違えがないかどうか検証

        $Usertest_add_Dlgate_Table = Dlgate_Table::where('name', 'test')->get();
        $this->assertEquals(3, count($Usertest_add_Dlgate_Table));
        //seederで挿入したtestユーザーのgate総数を検証

        $Usertest2_add_Dlgate_Table = Dlgate_Table::where('name', 'test2')->get();
        $this->assertEquals(3, count($Usertest2_add_Dlgate_Table));
        //seederで挿入したtest2ユーザーのgate総数を検証
    }
    public function testUser_TableSeeder(){
        $user = User::all();
        foreach($user as $row){
            $this->User_Add_Name($row["name"]);
        }
        $this->assertEquals(2, count($user));
        // seederに挿入したデータの総数に間違えがないかどうか検証
        
        $User_Email_Add = User::where('email','test@exmple.com')->get();
        foreach($User_Email_Add as $_User_Email_Add){
            $this->assertEquals('test',$_User_Email_Add["name"]);
            $this->assertEquals('test@exmple.com',$_User_Email_Add["email"]);
            $this->assertEquals('2020-12-09 14:40:35',$_User_Email_Add["email_verified_at"]);
        }
        

    }
    public function testGateUserSeeder(){
        $_GateUser =[]; 
        $GateUser = GateUser::all();
        foreach($GateUser as $row){
            array_push($_GateUser,$row["user"]);
        }
        $this->assertEquals(self::$Dlgate_Table_Name,$_GateUser);
        $this->assertEquals(self::$User_Table_Name,$_GateUser);
    }
}
