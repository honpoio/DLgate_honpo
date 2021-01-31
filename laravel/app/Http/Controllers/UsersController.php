<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * ユーザ登録
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = User::create($request);
        Mail::to($user->email)->send(new UserRegistered($user));
    }
}
