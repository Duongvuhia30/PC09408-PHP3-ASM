<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageCategory extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'image_category';

    protected $fillable = ['category_id', 'path'];

    protected $primaryKey = 'row_id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', ownerKey: 'row_id');
    }
    

}
