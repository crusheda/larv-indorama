<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class destination extends Model
{
    protected $table = 'ref_destination';
    public $timestamps = true;
    use SoftDeletes;
}
