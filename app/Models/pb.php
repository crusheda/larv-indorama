<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pb extends Model
{
    protected $table = 'pb';
    public $timestamps = true;
    use SoftDeletes;
}
