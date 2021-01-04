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
<<<<<<< HEAD
        return view('root');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

route::get('/privacy',function(){
        return view('privacy');
})->name('privacy');

=======
        return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();



<<<<<<< HEAD

// Route::get('/admin', 'AdminController@index')->name('admin');
// app()->make(ClassA::class);
>>>>>>> test
=======
>>>>>>> DB_redesign
Auth::routes(['verify'   => true, // メール確認機能
        'register' => true, // デフォルトの登録機能ON
        'reset'    => true,  // メールリマインダー機能ON
        ]);
Route::middleware('verified')->group(function () {
        Route::group(['middleware' => ['auth','verified']], function() {
<<<<<<< HEAD
<<<<<<< HEAD
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
=======


                
                Route::get('/DLgate','DLgate\CRUDController@select');
                
=======
                //ログインの有無によってアクセス制限
                Route::get('/DLgate','DLgate\DLgateCRUDController@select');
                route::get('/update','DLgate\DLgateCRUDController@select_update');
>>>>>>> DB_redesign
                Route::get('/DLgate/create',function(){
                        return view('DLgate_create');
                });

                route::post('/insert','DLgate\DLgateCRUDController@create');
                route::put('/update/add','DLgate\DLgateCRUDController@update');
                route::delete('/delete','DLgate\DLgateCRUDController@delete');


                Route::get('/user', 'Auth\UserInformationController@UserInformation')->name('user');
<<<<<<< HEAD
        
>>>>>>> test
=======
>>>>>>> DB_redesign
                Route::post('/user/edit/email','Auth\UserInformationController@EmailUpdate');         
                //退会,ユーザー情報編集機能のroutingtable
                Route::post('/user/edit/password','Auth\UserInformationController@PasswordChange');
                // パスワードを編集
                Route::get('/user/edit/delete','Auth\UserInformationController@WithdrawalForm');
                Route::post('/user/edit/Withdrawal','Auth\UserInformationController@Withdrawal');
<<<<<<< HEAD
<<<<<<< HEAD
        });
});
                Route::get('/DLgate/view','DLgate\DLGateDisplayController@DLGateForm');
                Route::get('/DLgate/Form',function(){
                        return view('DLgateForm');
                });
                Route::get('/auth/redirect/twitter', 'TwitterController@redirect')
                        ->name('twitter_OAuth');

                Route::get('/callback/follw', 'TwitterController@Twetter_Follow')
                        ->name('twitter');

                Route::get('/callback/RT', 'TwitterController@TweetRT')
                        ->where('provider','twitter');

=======
                //
=======
>>>>>>> DB_redesign
        });
});
                Route::get('/DLgate/view','DLgate\DLGateDisplayController@DLGateForm');
                Route::get('/DLgate/form',function(){
                        return view('DLgateForm');
                });
                Route::get('/auth/redirect/twitter', 'TwitterController@redirect')
                        ->name('twitter_OAuth');

                Route::get('/callback', 'TwitterController@Twetter_Follow')
                        ->name('twitter');

                Route::get('/callback2', 'TwitterController@TweetRT')
                        ->where('provider','twitter');

<<<<<<< HEAD

Route::get('/home', 'HomeController@index')->name('home');


>>>>>>> test
=======
>>>>>>> DB_redesign
