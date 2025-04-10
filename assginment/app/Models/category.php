<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'row_id';

    protected $fillable = [
        'name',
        'tag',
        'parent_id',
        'is_active',
        'image_id',
        'slug',
        'product_id'
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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function images()
    {
        return $this->hasMany(ImageCategory::class, 'category_id', 'row_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products', 'category_id', 'product_id');
    }

    public static function getDefaultCategoryId(): int
    {
        return Cache::rememberForever('default_category_id', function () {
            return self::where('slug', 'mac-dinh')->value('row_id'); // hoặc id
        });
    }

    protected static function booted()
    {
        static::deleting(function ($category) {
            if ($category->row_id === self::getDefaultCategoryId()) {
                throw new \Exception('Không thể xoá danh mục mặc định.');
            }

            if ($category->products()->exists()) {
                // Chuyển sản phẩm sang danh mục mặc định
                $defaultId = self::getDefaultCategoryId();
                foreach ($category->products as $product) {
                    $product->categories()->syncWithoutDetaching([$defaultId]);
                    $product->categories()->detach($category->row_id);
                }
            }
        });
    }
}