<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoOptions extends Model
{
    use HasFactory;
    protected $table = 'info_options';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','type_of_point', 'trunk_diameter', 'komi_diameter', 'height', 'komi_height' , 'trunk_slope', 
        'available_growth'
    ];
}
