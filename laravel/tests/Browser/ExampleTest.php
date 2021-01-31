<?php declare(strict_types=1);

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/')
                ->screenshot('tessss1')
                ->assertSee('ここには使用方法を記述する');
        });
    }
}
