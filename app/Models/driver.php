<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class driver extends Model
{
    protected $table = 'driver';
    public $timestamps = true;
    use SoftDeletes;
}
