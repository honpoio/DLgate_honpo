<?php declare(strict_types=1);

// テストを書くそもそもの目的は、
// バグの発見と修正や コードのリファクタリングを開発者がやりやすくすること。
// そしてテスト対象のソフトウェアのドキュメントとしての役割を果たすことだ。
// これらの目的を達成するためには、 ユニットテストがプログラム内のすべてのルートをカバーしていることが理想である。
// ひとつのユニットテストがカバーするのは、 通常はひとつの関数やメソッド内の特定のルートだけとなる。
// しかし、テストメソッドは必ずしもカプセル化して独立させる必要はない。
// 複数のテストメソッドの間に暗黙の依存性があって、 隠された実装シナリオがテストの中にあるのもよくあることだ。

namespace Tests\Feature;

use App\Dlgate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class twitterOAuthRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('usersTableSeeder');
        $this->seed('DlgatesTableSeeder');
    }

    public function testTwitterFollowOAuth(): void
    {
        // ルーティングDLgate/viewはtwitterのトークン要求画面(ログイン画面)に遷移するか確認
        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [1])->get();

        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
            //動的パスのDLgate/view={}を取得
        }
        // 認証ページの検証
        $response = $this->get('/auth/redirect/twitter?Follow=');

        $response->assertStatus(302);
        $target = parse_url($response->headers->get('location'));

        //認証ページへリダイレクトしているか確認

        //認証ページURLのhostの文字列と'api.twitter.com'を確認
        $this->assertEquals('api.twitter.com', $target['host']);
        $this->assertEquals('/oauth/authenticate', $target['path']);
        $this->assertStringContainsString('oauth_token=', $target['query']);
        // 文字列に部分文字列が含まれている場合はtrueを返す
    }

    // public function test_twitterFollow(){
    //     $response = $this->get(route('twitter'));
    //     $response->assertStatus(200);
    // }

    public function testTwitterRTOAuth(): void
    {
        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [1])->get();

        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
            //動的パスのDLgate/view={}を取得
        }
        // 認証ページの検証
        $response = $this->get('/auth/redirect/twitter?RT=');

        $response->assertStatus(302);
        $target = parse_url($response->headers->get('location'));

        //認証ページへリダイレクトしているか確認

        //認証ページURLのhostの文字列と'api.twitter.com'を確認
        $this->assertEquals('api.twitter.com', $target['host']);
        $this->assertEquals('/oauth/authenticate', $target['path']);
        $this->assertStringContainsString('oauth_token=', $target['query']);
    }
}
