<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraOptions extends Model
{
    use HasFactory;
    protected $table = 'extra_option';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','obstacles', 'pavement', 'nearby'
    ];
}
