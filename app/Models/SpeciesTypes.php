<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeciesTypes extends Model
{
    use HasFactory;
    protected $table = 'species_types';
    public $timestamps = false;
    protected $primaryKey = 'int';
    protected $fillable = [
       'int'	,'base_species'	,'type'
    ];
}
