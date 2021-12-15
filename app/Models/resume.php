<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class resume extends Model
{
    protected $table = 'resume';
    public $timestamps = true;
    use SoftDeletes;
}
