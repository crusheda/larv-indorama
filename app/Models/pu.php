<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pu extends Model
{
    protected $table = 'pendapatan_unit';
    public $timestamps = true;
    use SoftDeletes;
}
