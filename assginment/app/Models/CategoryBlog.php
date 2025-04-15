<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryBlog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories_blog';

    protected $primaryKey = 'row_id';

    protected $fillable = [
        'name',
        'slug',
        'is_active',
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

    public function blog()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    protected static function booted()
    {
        static::updating(function ($category) {
            if ($category->isDirty('is_active')) {
                $newStatus = $category->is_active;

                $category->blog()->update([
                    'is_active' => $newStatus,
                ]);
            }
        });
    }
}
