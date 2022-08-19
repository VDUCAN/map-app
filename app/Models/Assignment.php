<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    
    protected $table = 'create_assignment';
    public $timestamps = false;
    protected $primaryKey = 'assig_id';

    protected $fillable = [
        'assig_id','invoice_id', 'invoice_title', 'invoice_description', 'assig_description', 'assig_type_quantity' , 'assig_quantity_order_amount_desired', 
        'invoice_total_quantity_amount', 'assig_quantity_remain_perc', 'assig_quantity_remain_amount','assig_category','user_id','location_id_if_point','location_point_lat','location_point_lon',
        'location_id_if_polygon','polygon_data','start_date','end_date','quantity_order_amount_completed','date_submitted','response','approve','name'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','user_id');
    }
    
}
