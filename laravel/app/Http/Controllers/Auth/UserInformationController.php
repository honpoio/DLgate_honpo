<?php declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\addEmailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Database\OperateDB\UserOperationDB;

class UserInformationController extends Controller
{
    public function UserInformation(Request $request)
    {
        //ユーザー編集画面を表示させるメソッド
        $auth = auth::user();
        $this->checkLogin();
        return view('auth.UserInformationEdit', ['auth' => $auth]);
    }

    public function EmailUpdate(addEmailRequest $request, UserOperationDB $UserOperationDB)
    {
        //登録メールアドレスを更新するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        return  $UserOperationDB->EmailUpdate($request);
    }

    public function PasswordChange(ChangePasswordRequest $request , UserOperationDB $UserOperationDB)
    {
        //パスワードを変更するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        $user = Auth::user();
        return $UserOperationDB->PasswordChange($request, $user);
    }

    public function WithdrawalForm()
    {
        //退会フォームを表示させるメソッド
        $this->checkLogin();
        $auth = auth::user();
        return view('auth.WithdrawalForm', ['auth' => $auth]);
    }

    public function Withdrawal(WithdrawalRequest $request, UserOperationDB $UserOperationDB)
    {
        //退会処理を追加するメソッド
        $this->checkLogin();
        $this->checkTestUser();
        $id = auth::id();

        return $UserOperationDB->Withdrawal($request, $id);
    }

    private function checkLogin()
    {
        //ログインの有無をチェック
        if (!Auth::check()) {
            return App::abort(404);
        }
    }

    private function checkTestUser()
    {
        //テストユーザーのみ編集機能を制限
        if (Auth::user()['name'] === 'test') {
            return App::abort(404);
        }
    }
}
