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
        $user = User::find(1);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','kazuma115')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->screenshot('loggin');
        });
    }
}
