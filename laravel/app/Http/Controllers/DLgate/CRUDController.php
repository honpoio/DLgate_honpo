<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DLgateEditRequest;
use Illuminate\Support\Facades\Auth;
// use App\Dlgate_Table;

class CRUDController extends Controller
{
    private function checkLogin($user){
        //ログインの有無をチェック
        if(is_null($user["name"])){
            return  \App::abort(404);
        }
    }
    public function select(){
        $user = Auth::user();
        $this->checkLogin($user);
        return app('DB_Operation')->select($user);
    }

    public function select_update(Request $request){
        $user = Auth::user();
        $this->checkLogin($user);
        return app('DB_Operation')->select_update($request,$user);
    }
    public function update(DLgateEditRequest $request){
        $user = Auth::user();
        $this->checkLogin($user);
        return app('DB_Operation')->update($request,$user);
    }
    public function delete(Request $request){
        $user = Auth::user();
        $this->checkLogin($user);
        return app('DB_Operation')->delete($request,$user);
        
    }
    public function create(DLgateEditRequest $request){
        $user = Auth::user();
        $this->checkLogin($user);
        return app('DB_Operation')->create($request,$user);
    }
    
}