<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    protected $table = 'customer';
    public $timestamps = true;
    use SoftDeletes;
}