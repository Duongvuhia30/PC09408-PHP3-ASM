<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table='coupons';
    protected $fillable =[
        'discount_code',
        'type',
        'percent',
        'use_limit',
        'min_purchase',
        'note',
        'time_start',
        'time_end',
        'deleted_at',
    ];
  
}
