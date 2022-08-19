<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'information_table';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','is_point', 'lat', 'lon', 'latlon',
        'user_id','id_point', 'data_id', 'date_created', 'date_modified',
        'type_of_point','info_name', 'species', 'address', 'trunk_diameter',
        'komi_diameter','height', 'komi_height', 'trunk_slope', 'available_growth',
        'info_quantity','image_before_id', 'image_after_id'
     ];

    
}
