<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * ユーザ登録
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = User::create($request);
        Mail::to($user->email)->send(new UserRegistered($user));
    }
}