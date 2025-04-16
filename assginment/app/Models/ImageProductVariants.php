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

    protected $fillable = ['product_id', 'path'];

    public function variant()
    {
        return $this->belongsTo(ProductVariants::class, 'product_id', 'row_id');
    }
}
