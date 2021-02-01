<?php declare(strict_types=1);

namespace App\Http\Controllers\DLgate;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\DLgateEditRequest;
use Database\OperateDB\DLgateOperationDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DLgateCRUDController extends Controller
{
    public function Select(DLgateOperationDB $DLgateOperationDB)
    {
        $id = Auth::id();
        $this->CheckLogin();
        return $DLgateOperationDB->Select($id);
    }

    public function SelectUpdate(Request $request , DLgateOperationDB $DLgateOperationDB)
    {
        $id = Auth::id();
        $this->CheckLogin();
        return $DLgateOperationDB->SelectUpdate($request, $id);
    }

    public function Update(DLgateEditRequest $request , DLgateOperationDB $DLgateOperationDB)
    {
        $id = Auth::id();
        $this->CheckLogin();
        return $DLgateOperationDB->Update($request, $id);
    }

    public function Delete(Request $request , DLgateOperationDB $DLgateOperationDB)
    {
        $id = Auth::id();
        $this->checkLogin();
        return $DLgateOperationDB->Delete($request, $id);
    }

    public function Create(DLgateEditRequest $request , DLgateOperationDB $DLgateOperationDB)
    {
        $id = Auth::id();
        $this->checkLogin();
        return $DLgateOperationDB->Create($request, $id);
    }

    private function CheckLogin()
    {
        //ログインの有無をチェック
        if (!Auth::check()) {
            return App::abort(404);
        }
    }
}
