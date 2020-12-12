<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Dlgate_Table;
use App\GateUser;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\ChangePasswordRequest;
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
    
    public function EmailUpdate(Request $request){
        $auth = auth::user();
        $this->checkLogin();
        return DB::transaction(function () use($request){
            User::where('id',$request->UserId)
            ->lockForUpdate()
            //専有ロック
            ->update(['email'=> $request->Email,]);
            
            User::where('id',$request->UserId)
            ->update(['email_verified_at' =>NULL]);
            // return redirect('/email/verify');
            return redirect('/email/verify')->with('status', __('パスワードの変更に成功しました'));
        });
    }    
    
    public function PasswordChange(ChangePasswordRequest $request){
        $this->checkLogin();
        $user = Auth::user();
        return DB::transaction(function () use($request,$user){
            User::where('id',$request->UserId)
            ->lockForUpdate();
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return redirect()->route('user')->with('status', __('パスワードの変更に成功しました'));
        });
    }

    public function WithdrawalForm(){
        $this->checkLogin();
        $auth = auth::user();
        return view('auth.WithdrawalForm',['auth'=>$auth]);
    }

    public function Withdrawal(WithdrawalRequest $request){
        $this->checkLogin();
        $user = auth::user();
        
        return DB::transaction(function () use($request,$user){
            GateUser::where('user',$user["name"])
            ->lockForUpdate()
            ->delete();
            User::where('id',$request->UserId)
            ->lockForUpdate()
            ->delete();
            Dlgate_Table::where('id',$user["name"])
            ->lockForUpdate()
            ->delete();
            Auth::logout();
            return redirect('/')->with('status', __('退会できました。ご利用ありがとうございます'));
        });
    }
    

}
