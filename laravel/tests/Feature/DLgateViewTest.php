<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Dlgate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DLgateViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('usersTableSeeder');
        $this->seed('dlgate_tableSeeder');
    }

    public function testGateViewForm(): void
    {
        //dlgate_tableに登録したデータが表示されているかどうか検証するメソッド
        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [mt_rand(1, 6)])->get();

        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
        }

        $response = $this->get('/DLgate/view?id=' . $URL_id);
        $response->assertStatus(200);
        $response->assertDontSee('ダウンロードURL:');
    }

    public function testGate_Url_View(): void
    {
        // Gateの手順twitterフォロー等の手順が済んだらURLが出現するか検証するメソッド
        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [mt_rand(1, 6)])->get();

        foreach ($dlgate_table as $row) {
            $dl_url = $row->dl_url;
        }

        $response = $this->withSession([
            'Twitter_user_sucsess' => true,
            'Twitter_tweet_sucsess' => true,
            'youtube_channel_id_sucsess' => true,
            'dl_url' => $dl_url,
            ])
            ->get('/DLgate/Form')
            ->assertSee('ダウンロードURL:');
    }
}
