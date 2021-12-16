<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehicle extends Model
{
    protected $table = 'vehicle';
    public $timestamps = true;
    use SoftDeletes;
}
