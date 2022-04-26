<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    // belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // hasmany products
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }
}
