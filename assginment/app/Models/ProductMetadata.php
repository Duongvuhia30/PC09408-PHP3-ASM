<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMetadata extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_metadatas';

    protected $primaryKey = 'row_id';

    protected $fillable = [
        'product_id',
        'language',
        'publish_year',
        'author'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'row_id');
    }
}
