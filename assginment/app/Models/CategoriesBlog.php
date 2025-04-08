<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesBlog extends Model
{
    use HasFactory;

    protected $table = 'categories_blog'; // Thêm dòng này để trỏ đúng tên bảng

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
    ];

    public function blogs()
    {
        // Quan hệ một-nhiều, mỗi category có nhiều blog
        return $this->hasMany(Blog::class, 'category_id');
    }
}
