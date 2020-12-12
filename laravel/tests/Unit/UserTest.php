<?php

namespace Tests\Unit;


use App\Eloquent\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    // use RefreshDatabase;

    // public function testFirstYaizuuuuNameUser()
    // {
    //     $index = 0;

    //     $users = factory(User::class, 3)->create()
    //         ->each(function ($user) use (&$index) {
    //             $name = ['yaizuuuu', 'yaizu', 'yaizuu',];
    //             $user->name = $name[$index++];
    //             $user->save();
    //         });


    //     $actual = (new User)->firstYaizuuuuNameUser();

    //     $this->assertSame('yaizuuuu', $actual->name);
    // }
}