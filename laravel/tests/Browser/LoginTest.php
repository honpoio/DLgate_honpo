<?php declare(strict_types=1);

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testBasicExample(): void
    {
        //サーバー自体は本番用なので.envをテスト用のDBに変更する必要があり
        $user = User::find(1);
        $this->browse(function ($browser) use ($user): void {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'testpass')
                ->press('Login')
                ->assertPathIs('/')
                ->screenshot('login');
        });
    }
}
