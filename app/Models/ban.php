<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ban extends Model
{
    protected $table = 'ban';
    public $timestamps = true;
    use SoftDeletes;
}
