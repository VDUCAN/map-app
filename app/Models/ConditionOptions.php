<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionOptions extends Model
{
    use HasFactory;
    protected $table = 'condition_options';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [

        'id','health', 'stability', 'trunk_condition', 'komi_condition'
    ];
}
