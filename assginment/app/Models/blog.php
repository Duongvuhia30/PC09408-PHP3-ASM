<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blog';

    protected $primaryKey = 'row_id';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'is_active',
        'published_at',
        'describe',
        'author',
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
        return $this->belongsTo(CategoryBlog::class, 'category_id', 'row_id');
    }
}
