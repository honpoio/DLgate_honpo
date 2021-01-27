<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DLgateEditRequest;
use Illuminate\Support\Facades\Auth;
use Database\operateDB\DLgateOperationDB;

class DLgateCRUDController extends Controller
{
    private function CheckLogin(){
        //ログインの有無をチェック
        if (!Auth::check()) {
            return \App::abort(404);
        }        
    }
    public function Select(){
        $id= Auth::id();
        $this->CheckLogin();
        return app()->make(DLgateOperationDB::class)->Select($id);
    }

    public function SelectUpdate(Request $request){
        $id = Auth::id();
        $this->CheckLogin();
        return app()->make(DLgateOperationDB::class)->SelectUpdate($request,$id);
    }
    public function Update(DLgateEditRequest $request){
        $id = Auth::id();
        $this->CheckLogin();
        return app()->make(DLgateOperationDB::class)->Update($request,$id);
    }
    public function Delete(Request $request){
        $id = Auth::id();
        $this->checkLogin();
        return app()->make(DLgateOperationDB::class)->Delete($request,$id);
        
    }
    public function Create(DLgateEditRequest $request){
        $id = Auth::id();
        $this->checkLogin();
        return app()->make(DLgateOperationDB::class)->Create($request,$id);
    }
    
}