<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Dlgate;
// use PHPUnit\Framework\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DlgatesTableSeederTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    private static $DlgateTableName = [];
    //Dlgate_Tableのカラムnameを格納
    private static $UserTableName = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('usersTableSeeder');
        $this->seed('DlgatesTableSeeder');
    }

    public function testDLgateTableSeeder()
    {
        // DLgate_tableに追加したseederのデータを検証するメソッド

        $Dlgate_Table = Dlgate::all();

        foreach ($Dlgate_Table as $row) {
            $this->DLgateExtractionName($row['name']);
        }
        $this->ArrayUniqueDelete();

        $this->assertCount(7, $Dlgate_Table);
        // seederに挿入したデータの総数に間違えがないかどうか検証

        $Usertest_add_Dlgate_Table = Dlgate::where('user_id', '1')->get();
        $this->assertCount(4, $Usertest_add_Dlgate_Table);
        //seederで挿入したtestユーザーのgate総数を検証

        $Usertest2_add_Dlgate_Table = Dlgate::where('user_id', '2')->get();
        $this->assertCount(3, $Usertest2_add_Dlgate_Table);
        //seederで挿入したtest2ユーザーのgate総数を検証
        return self::$DlgateTableName;
    }

    public function testUserTableSeeder()
    {
        //Userテーブルに追加したseederのデータを検証するメソッド
        $user = User::all();

        foreach ($user as $row) {
            $this->UserExtractionName($row['name']);
        }
        $this->assertCount(2, $user);
        // seederに挿入したデータの総数に間違えがないかどうか検証

        $User_Email_Add = User::where('email', 'test@exmple.com')->get();

        foreach ($User_Email_Add as $_User_Email_Add) {
            //seederで追加したデータ
            $this->assertEquals('test', $_User_Email_Add['name']);
            $this->assertEquals('test@exmple.com', $_User_Email_Add['email']);
            $this->assertEquals('2020-12-09 14:40:35', $_User_Email_Add['email_verified_at']);
        }
        return self::$UserTableName;
    }

    //Userテーブルのカラムnameを格納

    private function DLgateExtractionName($name): void
    {
        //DLgateテーブルのnameカラムを抽出するメソッド
        array_push(self::$DlgateTableName, $name);
    }

    private function UserExtractionName($name): void
    {
        //Userテーブルのnameカラムを抽出するメソッド
        array_push(self::$UserTableName, $name);
    }

    private function ArrayUniqueDelete(): void
    {
        //DBから一意のデータを削除するメソッド
        self::$DlgateTableName = array_values(array_unique(self::$DlgateTableName));
    }
}
