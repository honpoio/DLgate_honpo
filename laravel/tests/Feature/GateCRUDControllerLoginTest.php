<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Dlgate;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class GateCRUDControllerLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('usersTableSeeder');
        $this->seed('DlgatesTableSeeder');
    }

    public function testGateLoginForm(): void
    {
        // 　/Dlgateでログインの有無を検証する

        $this->get('DLgate')->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/DLgateにアクセスする

        $response = $this->actingAs(User::find(1))
            ->get('DLgate');

        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
            ->assertViewIs('DLgate');
    }

    public function testGateLoginUpdateForm(): void
    {
        // /Dlgate/update?URL_id=(URL_id)のログインの有無を検証

        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [1])->get();

        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
            //動的パスのupdate?URL_id={}を取得
        }

        $this->get('/DLgate/update?URL_id=' . $URL_id)->assertRedirect('login')->assertStatus(302);
        //ログインしていない状態で/DLgateにアクセスする

        $response = $this->actingAs(User::find(1))
            ->get('/DLgate/update?URL_id=' . $URL_id);
        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
            ->assertViewIs('DLgate_update');
    }

    public function testGateLoginInsertForm(): void
    {
        //DLgate/createパスのログイン有無を検証

        $this->get('DLgate/create')->assertRedirect('login')->assertStatus(302);

        $response = $this->actingAs(User::find(1))
            ->get('DLgate/create');

        $this->assertTrue(Auth::check());
        $response->assertStatus(200)
            ->assertViewIs('DLgate_create');
    }

    public function testGateLoginviewForm(): void
    {
        // ルーティングDLgate/viewはログインしていない状態でのアクセスが可能か検証
        $dlgate_table = Dlgate::select(['URL_id'])->where('id', [1])->get();

        foreach ($dlgate_table as $row) {
            $URL_id = $row->URL_id;
            //動的パスのDLgate/view={}を取得
        }
        $this->get('/DLgate/view?id=' . $URL_id)->assertViewIs('DLgateForm')->assertStatus(200);
    }
}
