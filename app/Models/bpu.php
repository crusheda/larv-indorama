<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bpu extends Model
{
    protected $table = 'bpu';
    public $timestamps = true;
    use SoftDeletes;
}
