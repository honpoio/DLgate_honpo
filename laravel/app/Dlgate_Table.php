<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlgate_Table extends Model
{
    protected $table ='dlgate_table';

    public $timestamps = false;

    protected $guarded = [
        'id',
    ];
}
