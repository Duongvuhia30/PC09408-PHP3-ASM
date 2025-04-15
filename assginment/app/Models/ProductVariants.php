<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductVariants extends Model
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
        'pdf',
        'release_date'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'row_id');
    }

    public function images()
    {
        return $this->hasMany(ImageProductVariants::class, 'variant_id', 'row_id');
    }
}
