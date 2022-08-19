<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $table = 'condition_table';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','data_id', 'overall_health', 'cond_name', 'address',
        'stability','trunk_status', 'trunk_problems', 'komi_status', 'komi_problems',
        'diseases','recommended', 'condition_notes'
     ];

     											

}
