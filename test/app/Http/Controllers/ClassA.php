<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassA extends Controller
{
    public function __construct(ClassB $classB)
    {
        var_dump('classA').PHP_EOL;
    }
}
