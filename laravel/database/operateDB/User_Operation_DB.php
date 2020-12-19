<?php
namespace Database\operateDB;

use Illuminate\Http\Request;

use App\User;
use App\GateUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_Operation_DB
{

    public function EmailUpdate($request){
        return DB::transaction(function () use($request){
            User::where('id',$request->UserId)
            ->lockForUpdate()
            //専有ロック
            ->update(['email'=> $request->Email,]);
            
            User::where('id',$request->UserId)
            ->update(['email_verified_at' =>NULL]);
            // return redirect('/email/verify');
            return redirect('/email/verify')->with('status', __('メールアドレスの変更に成功しました'));
        });
    }
    public function PasswordChange($request,$user){
        return DB::transaction(function () use($request,$user){
            User::where('id',$request->UserId)
            ->lockForUpdate();
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return redirect()->route('user')->with('status', __('パスワードの変更に成功しました'));
        });
    }
    public function Withdrawal($request,$user){
        return DB::transaction(function () use($request,$user){
            GateUser::where('user',$user["name"])
            ->lockForUpdate()
            ->delete();
            Auth::logout();
            return redirect('/')->with('status', __('退会できました。ご利用ありがとうございます'));
        });
    }
}