<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassB extends Controller
{
    public function __construct(ClassC $classC)
    {
        var_dump('ClassBインスタンス化完了').PHP_EOL;
    }
}
