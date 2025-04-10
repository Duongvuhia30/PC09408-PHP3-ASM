<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageProductVariants extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'image_product_variants';

    protected $primaryKey = 'row_id';

    protected $fillable = ['variant_id', 'path'];

    public function variant()
    {
        return $this->belongsTo(ProductVariants::class, 'variant_id', 'row_id');
    }
}
