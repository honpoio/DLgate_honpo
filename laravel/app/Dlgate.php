<?php declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlgate extends Model
{
    public $timestamps = false;
    protected $table = 'dlgates';

    protected $guarded = [
        'id',
    ];
}
