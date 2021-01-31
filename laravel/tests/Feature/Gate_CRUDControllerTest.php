<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Dlgate;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class Gate_CRUDControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithoutMiddleware;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('usersTableSeeder');
        $this->seed('dlgate_tableSeeder');
    }

    public function testGateUpdate(): void
    {
        //Gateテーブルのupdateが可能かどうか検証するメソッド

        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [1])->get();
        // updateするGateを用意
        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
        }

        $response = $this->actingAs(User::find(1))
        //ログイン
            ->put('/DLgate/update/add', [
            'Twitter_user' => 'Sankei_news',
            'tweet_id' => '1337272952140623874',
            'gate_name' => 'sankei',
            'dl_url' => 'https://www.innovation.co.jp/',
            'URL_id' => $URL_id,
            ]);

        $response->assertStatus(302);
        $this->assertTrue(Auth::check());
        $this->assertDatabaseHas('dlgates', [
            'Twitter_user' => 'Sankei_news',
            'Twitter_tweet' => '1337272952140623874',
            'gate_name' => 'sankei',
            'dl_url' => 'https://www.innovation.co.jp/',
            'URL_id' => $URL_id,
        ]);
    }

    public function testGateInsert(): void
    {
        //GateテーブルのInsertが可能かどうか検証するメソッド
        $response = $this->actingAs(User::find(1))
            ->post('/DLgate/insert', [
            'Twitter_user' => 'Sankei_news',
            'tweet_id' => '1337272952140623874',
            'gate_name' => 'sankei',
            'dl_url' => 'https://www.innovation.co.jp/',
            'youtube_channel_id' => 'UCH54kxctdxPdBVr_lbVU9uA',
        ]);

        $this->assertTrue(Auth::check());
        $response->assertStatus(302);
        $this->assertDatabaseHas('dlgates', [
            'Twitter_user' => 'Sankei_news',
            'Twitter_tweet' => '1337272952140623874',
            'gate_name' => 'sankei',
            'dl_url' => 'https://www.innovation.co.jp/',
        ]);
    }

    public function testGateDelete(): void
    {
        //Gateテーブルのdeleteが可能かどうか検証するメソッド
        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [2])->get();
        // deleteするGateのURL_idを用意
        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
        }

        $response = $this->actingAs(User::find(1))
            ->delete('/DLgate/delete', [
            'URL_id' => $URL_id,
        ]);

        $this->assertTrue(Auth::check());
        $response->assertStatus(302);
        $this->assertDatabaseMissing('dlgates', [
            'URL_id' => $URL_id,
        ]);
    }
}
