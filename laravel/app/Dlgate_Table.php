<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlgate_Table extends Model
{
    protected $table ='dlgates';

    public $timestamps = false;

    protected $guarded = [
        'id',
    ];
}
