<?php declare(strict_types=1);

namespace App\Http\Controllers\DLgate;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\DLgateEditRequest;
use Database\operateDB\DLgateOperationDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DLgateCRUDController extends Controller
{
    public function Select()
    {
        $id = Auth::id();
        $this->CheckLogin();
        return app()->make(DLgateOperationDB::class)->Select($id);
    }

    public function SelectUpdate(Request $request)
    {
        $id = Auth::id();
        $this->CheckLogin();
        return app()->make(DLgateOperationDB::class)->SelectUpdate($request, $id);
    }

    public function Update(DLgateEditRequest $request)
    {
        $id = Auth::id();
        $this->CheckLogin();
        return app()->make(DLgateOperationDB::class)->Update($request, $id);
    }

    public function Delete(Request $request)
    {
        $id = Auth::id();
        $this->checkLogin();
        return app()->make(DLgateOperationDB::class)->Delete($request, $id);
    }

    public function Create(DLgateEditRequest $request)
    {
        $id = Auth::id();
        $this->checkLogin();
        return app()->make(DLgateOperationDB::class)->Create($request, $id);
    }

    private function CheckLogin()
    {
        //ログインの有無をチェック
        if (!Auth::check()) {
            return App::abort(404);
        }
    }
}
