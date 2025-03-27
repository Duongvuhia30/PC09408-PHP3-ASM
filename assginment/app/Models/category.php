<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'row_id',
        'slug',
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
}
