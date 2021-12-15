<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bbm extends Model
{
    protected $table = 'pengeluaran_bbm';
    public $timestamps = true;
    use SoftDeletes;
}
