<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Dlgate_Table;
class dlgate_tableSeederTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDLgate_TableSeeder()
    {
        $Dlgate_Table = Dlgate_Table::all();
        // dd($Dlgate_Table);
        // $this->assertEquals(6,count($Dlgate_Table));
    }
}
