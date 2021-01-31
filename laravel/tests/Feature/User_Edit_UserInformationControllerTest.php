<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Dlgate;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class User_Edit_UserInformationControllerTest extends TestCase
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

    public function testEmailUpdate(): void
    {
        // Emailのフィールドがupdateできるか検証
        $dlgate_table = User::select(['id'])->where('id', [2])->get();
        // updateするGateのカラムidのフィールドを用意
        foreach ($dlgate_table as $row) {
            $id = $row->id;
        }

        $response = $this->actingAs(User::find(2))
            ->post('/user/edit/email', [
            'Email' => 'hogehoge@gmail.com',
            'UserId' => $id,
        ]);
        //Emailカラムのフィールドをアップデート

        $response->assertStatus(302)
            ->assertRedirect('/email/verify');

        $this->assertTrue(Auth::check());

        $this->assertDatabaseHas('users', [
            'Email' => 'hogehoge@gmail.com',
        ]);
    }

    public function testPasswordChange(): void
    {
        // passwordのフィールドがupdateできるか検証

        $dlgate_table = User::select(['id', 'password'])->where('id', [2])->get();
        // updateするGateのカラムidのフィールドを用意

        foreach ($dlgate_table as $row) {
            $id = $row->id;
            $password = $row->password;
        }

        $response = $this->actingAs(User::find(2))
            ->post('/user/edit/password', [
            'CurrentPassword' => 'testpass',
            'newPassword' => 'loginsimasuyo',
            'newPassword_confirmation' => 'loginsimasuyo',
            'UserId' => $id,
        ]);
        //passwordカラムのフィールドをアップデート

        $response->assertStatus(302)
            ->assertRedirect('/user');
        $this->assertTrue(Auth::check());
        $this->assertDatabaseMissing('users', [
            'password' => $password,
        ]);
    }

    public function testWithdrawal(): void
    {
        // 退会できるか検証
        $dlgate_table = User::select(['id', 'name'])->where('id', [2])->get();

        foreach ($dlgate_table as $row) {
            $id = $row->id;
            $name = $row->name;
        }

        $response = $this->actingAs(User::find(2))
            ->post('/user/edit/Withdrawal', [
        'CurrentPassword' => 'testpass',
        'UserId' => $id,
    ]);
        //users,dlgate_table,gate_usersと同じnameを持つカラムを削除

        $response->assertStatus(302)
            ->assertRedirect('/');
        $this->assertFalse(Auth::check());

        $this->assertDatabaseMissing('users', [
        'id' => $id,
    ]);
        $this->assertDatabaseMissing('dlgates', [
        'user_id' => $id,
    ]);
    }
}
