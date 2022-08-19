<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $table = 'extra_table';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','data_id', 'obstacles', 'extra_name', 'pavement',
        'class','nearby', 'obstacle_to_humans', 'extras_notes', 'pavement_image_id'
     ];

   								
}
