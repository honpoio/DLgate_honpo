<?php

namespace Tests\Browser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        //サーバー自体は本番用なので.envをテスト用のDBに変更する必要があり
        $user = User::find(1);
        $this->browse(function ($browser) use ($user){
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','testpass')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->screenshot('login');
        });
    }
}
