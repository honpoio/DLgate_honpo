<?php declare(strict_types=1);

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DLgateReadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->loginAs(User::find(1))
                ->visit('/DLgate')
                ->click('@view-button')
                ->assertSee('test_gate')
                ->screenshot('DLgate');
        });
    }
}
