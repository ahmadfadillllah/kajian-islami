<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $connection = 'FOCUS';
    protected $table = 'FLT_VEHICLE';

    protected $guarded = [];
}
