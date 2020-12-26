<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\addEmailRequest;
use App\Http\Requests\WithdrawalRequest;

class UserInformationController extends Controller
{
    private function checkLogin(){
        //ログインの有無をチェック
        if (!Auth::check()) {
            return \App::abort(404);
        }        
    }
    

    public function UserInformation(Request $request){
    $auth = auth::user();
    $this->checkLogin();
    return view('auth.UserInformationEdit',['auth'=>$auth]);
    }
    
    public function EmailUpdate(addEmailRequest $request){
        $this->checkLogin();
        return app('User_DB_Operation')->EmailUpdate($request);
    }    
    
    public function PasswordChange(ChangePasswordRequest $request){
        $this->checkLogin();
        $user = Auth::user();
        return app('User_DB_Operation')->PasswordChange($request,$user);
    }

    public function WithdrawalForm(){
        $this->checkLogin();
        $auth = auth::user();
        return view('auth.WithdrawalForm',['auth'=>$auth]);
    }

    public function Withdrawal(WithdrawalRequest $request){
        $this->checkLogin();
        $id = auth::id();
        
        return app('User_DB_Operation')->Withdrawal($request,$id);
    }
    

}
