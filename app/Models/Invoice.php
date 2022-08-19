<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    public $timestamps = false;
    protected $primaryKey = 'invoice_id';
    protected $fillable = [
        'invoice_id','invoice_geo_id', 'invoice_geo_title', 'invoice_code', 'invoice_title',
        'invoice_description','invoice_type_quantity', 'invoice_total_quantity_amount', 'invoice_total_quantity_amount_remaining', 'invoice_price_per_amount',
        'invoice_total_price_per_invoice','invoice_total_price_per_invoice_remaining', 'invoice_category'
     ];	

}
