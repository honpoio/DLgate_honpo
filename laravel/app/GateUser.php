<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GateUser extends Model
{
    protected $table ='gate_users';

    public $timestamps = false;

    protected $fillable = ['user'];
}
