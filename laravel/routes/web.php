<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
        return view('root');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();



Auth::routes(['verify'   => true, // メール確認機能
        'register' => true, // デフォルトの登録機能ON
        'reset'    => true,  // メールリマインダー機能ON
        ]);
Route::middleware('verified')->group(function () {
        Route::group(['middleware' => ['auth','verified']], function() {
                //ログインの有無によってアクセス制限
                Route::get('/DLgate','DLgate\DLgateCRUDController@select');
                route::get('/DLgate/update','DLgate\DLgateCRUDController@select_update');
                Route::get('/DLgate/create',function(){
                        return view('DLgate_create');
                });

                route::post('/DLgate/insert','DLgate\DLgateCRUDController@create');
                route::put('/DLgate/update/add','DLgate\DLgateCRUDController@update');
                route::delete('/DLgate/delete','DLgate\DLgateCRUDController@delete');


                Route::get('/user', 'Auth\UserInformationController@UserInformation')->name('user');
                Route::post('/user/edit/email','Auth\UserInformationController@EmailUpdate');         
                //退会,ユーザー情報編集機能のroutingtable
                Route::post('/user/edit/password','Auth\UserInformationController@PasswordChange');
                // パスワードを編集
                Route::get('/user/edit/delete','Auth\UserInformationController@WithdrawalForm');
                Route::post('/user/edit/Withdrawal','Auth\UserInformationController@Withdrawal');
        });
});
                Route::get('/DLgate/view','DLgate\DLGateDisplayController@DLGateForm');
                Route::get('/DLgate/Form',function(){
                        return view('DLgateForm');
                });
                Route::get('/auth/redirect/twitter', 'TwitterController@redirect')
                        ->name('twitter_OAuth');

                Route::get('/callback', 'TwitterController@Twetter_Follow')
                        ->name('twitter');

                Route::get('/callback2', 'TwitterController@TweetRT')
                        ->where('provider','twitter');

