<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    public $timestamps = true;
    use SoftDeletes;
}
