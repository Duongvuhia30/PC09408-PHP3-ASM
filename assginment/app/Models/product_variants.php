<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class product_variants extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_variants';

    protected $primaryKey = 'row_id';

    protected $with = ['images'];

    protected $fillable = [
        'product_id',
        'code',
        'price',
        'stock',
        'name',
        'type',
        'image',
        'pdf'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'row_id');
    }

    public function images()
    {
        return $this->hasMany(image_product_variants::class, 'variant_id', 'row_id');
    }
}
