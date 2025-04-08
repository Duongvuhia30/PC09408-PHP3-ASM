<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
        'published_at',
        'category_id',
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

    public function category()
    {
        return $this->belongsTo(CategoriesBlog::class, 'category_id');
    }
    public static function createSlug($title)
    {
        $slug = Str::slug($title);
        if (Blog::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . Str::random(5);
        }
        return $slug;
    }
    

}

