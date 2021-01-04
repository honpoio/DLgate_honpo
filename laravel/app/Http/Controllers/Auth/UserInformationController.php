<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Requests\addEmailRequest;
=======
>>>>>>> test
=======
use App\Http\Requests\addEmailRequest;
>>>>>>> DB_redesign
=======
use App\Http\Requests\addEmailRequest;
>>>>>>> frontend
use App\Http\Requests\WithdrawalRequest;

class UserInformationController extends Controller
{
    private function checkLogin(){
        //ログインの有無をチェック
        if (!Auth::check()) {
            return \App::abort(404);
        }        
    }
    
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> prepare_deploy
    private function checkTestUser(){
        //テストユーザーのみ編集機能を制限
        if(Auth::user()["name"] === 'test'){
            return \App::abort(404);
        }

    }
<<<<<<< HEAD

    public function UserInformation(Request $request){
        //ユーザー編集画面を表示させるメソッド
=======

    public function UserInformation(Request $request){
>>>>>>> test
=======

    public function UserInformation(Request $request){
        //ユーザー編集画面を表示させるメソッド
>>>>>>> prepare_deploy
    $auth = auth::user();
    $this->checkLogin();
    return view('auth.UserInformationEdit',['auth'=>$auth]);
    }
    
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function EmailUpdate(addEmailRequest $request){
        //登録メールアドレスを更新するメソッド
        $this->checkLogin();
        $this->checkTestUser();
=======
    public function EmailUpdate(Request $request){
=======
    public function EmailUpdate(addEmailRequest $request){
>>>>>>> frontend
        $auth = auth::user();
=======
    public function EmailUpdate(addEmailRequest $request){
<<<<<<< HEAD
>>>>>>> DB_redesign
        $this->checkLogin();
<<<<<<< HEAD
>>>>>>> test
=======
>>>>>>> frontend
=======
        //登録メールアドレスを更新するメソッド
        $this->checkLogin();
        $this->checkTestUser();
>>>>>>> prepare_deploy
        return app('User_DB_Operation')->EmailUpdate($request);
    }    
    
    public function PasswordChange(ChangePasswordRequest $request){
<<<<<<< HEAD
<<<<<<< HEAD
        //パスワードを変更するメソッド
        $this->checkLogin();
        $this->checkTestUser();
=======
        $this->checkLogin();
>>>>>>> test
=======
        //パスワードを変更するメソッド
        $this->checkLogin();
        $this->checkTestUser();
>>>>>>> prepare_deploy
        $user = Auth::user();
        return app('User_DB_Operation')->PasswordChange($request,$user);
    }

    public function WithdrawalForm(){
<<<<<<< HEAD
<<<<<<< HEAD
        //退会フォームを表示させるメソッド
=======
>>>>>>> test
=======
        //退会フォームを表示させるメソッド
>>>>>>> prepare_deploy
        $this->checkLogin();
        $auth = auth::user();
        return view('auth.WithdrawalForm',['auth'=>$auth]);
    }

    public function Withdrawal(WithdrawalRequest $request){
<<<<<<< HEAD
<<<<<<< HEAD
        //退会処理を追加するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        $id = auth::id();
        
        return app('User_DB_Operation')->Withdrawal($request,$id);
=======
=======
        //退会処理を追加するメソッド
>>>>>>> prepare_deploy
        $this->checkLogin();
        $this->checkTestUser();
        $id = auth::id();
        
<<<<<<< HEAD
<<<<<<< HEAD
        return app('User_DB_Operation')->Withdrawal($request,$user);
>>>>>>> test
=======
        return app('User_DB_Operation')->Withdrawal($request,$id);
>>>>>>> DB_redesign
=======
        return app('User_DB_Operation')->Withdrawal($request,$user);
>>>>>>> frontend
    }
    

}
