<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'row_id';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'tag',
        'category_id',
        'publisher_id',
        'type',
        'is_active',
        'release_date'

    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $field ??= $this->getRouteKeyName();
        return $this->where($field, $value)->firstOrFail();
    }
    
    public function publisher()
    {
        return $this->belongsTo(publishers::class, 'publisher_id', 'row_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id', 'row_id');
    }

    public function metadata()
    {
        return $this->hasOne(ProductMetadata::class, 'product_id', 'row_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_products',
            'product_id',
            'category_id',
            'row_id',
            'row_id'
        );
    }

    public function images()
    {
        return $this->hasMany(ImageProductVariants::class, 'product_id', 'row_id');
    }
}
