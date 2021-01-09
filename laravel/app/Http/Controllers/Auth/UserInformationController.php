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
    
    private function checkTestUser(){
        //テストユーザーのみ編集機能を制限
        if(Auth::user()["name"] === 'test'){
            return \App::abort(404);
        }

    }

    public function UserInformation(Request $request){
        //ユーザー編集画面を表示させるメソッド
    $auth = auth::user();
    $this->checkLogin();
    return view('auth.UserInformationEdit',['auth'=>$auth]);
    }
    
    public function EmailUpdate(addEmailRequest $request){
        //登録メールアドレスを更新するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        return app('User_DB_Operation')->EmailUpdate($request);
    }    
    
    public function PasswordChange(ChangePasswordRequest $request){
        //パスワードを変更するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        $user = Auth::user();
        return app('User_DB_Operation')->PasswordChange($request,$user);
    }

    public function WithdrawalForm(){
        //退会フォームを表示させるメソッド
        $this->checkLogin();
        $auth = auth::user();
        return view('auth.WithdrawalForm',['auth'=>$auth]);
    }

    public function Withdrawal(WithdrawalRequest $request){
        //退会処理を追加するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        $id = auth::id();
        
        return app('User_DB_Operation')->Withdrawal($request,$id);
    }
    

}

