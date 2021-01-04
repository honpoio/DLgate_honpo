<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class twitter_user extends Authenticatable 
{
    // use Notifiable;
    protected $table = 'twitter_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //記述した属性意外値をもたない
        'twitter_id',
        'twitter_name',
        'twitter_nickname',
        'twitter_description',
        'twitter_icon_url',
        'twitter_token',
        'twitter_token_secret'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     #特定の属性を返したくない時に使用
    //     'twitter_id',
    //     'twitter_name',
    //     'twitter_nickname',
    //     'twitter_description',
    //     'twitter_icon_url',
    //     'twitter_token',
    //     'twitter_token_secret'
    // ];

    /**
     * The attributes that should be cast to native types.
     *
      * @var array
      */
//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];
}
