<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetData extends Model
{
    use HasFactory;
    protected $fillable = ['carId','make','model','description','segment','vehicle_type','body_style','introduction_date','end_date','number_doors'];   
}
