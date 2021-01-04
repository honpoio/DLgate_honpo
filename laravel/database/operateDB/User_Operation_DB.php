<?php
namespace Database\operateDB;

use Illuminate\Http\Request;

use App\User;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\GateUser;
>>>>>>> test
=======
>>>>>>> DB_redesign
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_Operation_DB
{

    public function EmailUpdate($request){
<<<<<<< HEAD
        //メール情報更新
=======
>>>>>>> test
        return DB::transaction(function () use($request){
            User::where('id',$request->UserId)
            ->lockForUpdate()
            //専有ロック
            ->update(['email'=> $request->Email,]);
            
            User::where('id',$request->UserId)
            ->update(['email_verified_at' =>NULL]);
<<<<<<< HEAD
            //再度メール認証
=======
            // return redirect('/email/verify');
>>>>>>> test
            return redirect('/email/verify')->with('status', __('メールアドレスの変更に成功しました'));
        });
    }
    public function PasswordChange($request,$user){
<<<<<<< HEAD
        //パスワード変更
=======
>>>>>>> test
        return DB::transaction(function () use($request,$user){
            User::where('id',$request->UserId)
            ->lockForUpdate();
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return redirect()->route('user')->with('status', __('パスワードの変更に成功しました'));
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    public function Withdrawal($request,$id){
        //退会
        return DB::transaction(function () use($request,$id){
            User::where('id',$id)
=======
    public function Withdrawal($request,$user){
        return DB::transaction(function () use($request,$user){
            GateUser::where('user',$user["name"])
>>>>>>> test
=======
    public function Withdrawal($request,$id){
        return DB::transaction(function () use($request,$id){
            User::where('id',$id)
>>>>>>> DB_redesign
            ->lockForUpdate()
            ->delete();
            Auth::logout();
            return redirect('/')->with('status', __('退会できました。ご利用ありがとうございます'));
        });
    }
}