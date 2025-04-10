<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publishers extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'publishers';

    protected $primaryKey = 'row_id';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'contact_email',
        'slug'
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
    
    public function products()
    {
        return $this->hasMany(Product::class, 'publisher_id', 'row_id');
    }
}
