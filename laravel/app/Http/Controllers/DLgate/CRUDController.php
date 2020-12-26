<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DLgateEditRequest;
use Illuminate\Support\Facades\Auth;
// use App\Dlgate_Table;

class CRUDController extends Controller
{
    private function checkLogin(){
        //ログインの有無をチェック
        if (!Auth::check()) {
            return \App::abort(404);
        }        
    }
    public function select(){
        $id= Auth::id();
        $this->checkLogin();
        return app('Gate_DB_Operation')->select($id);
    }

    public function select_update(Request $request){
        $id = Auth::id();
        $this->checkLogin();
        return app('Gate_DB_Operation')->select_update($request,$id);
    }
    public function update(DLgateEditRequest $request){
        $user = Auth::user();
        $this->checkLogin();
        return app('Gate_DB_Operation')->update($request,$user);
    }
    public function delete(Request $request){
        $user = Auth::user();
        $this->checkLogin();
        return app('Gate_DB_Operation')->delete($request,$user);
        
    }
    public function create(DLgateEditRequest $request){
        $user = Auth::user();
        $this->checkLogin();
        return app('Gate_DB_Operation')->create($request,$user);
    }
    
}