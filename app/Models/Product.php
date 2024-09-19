<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product  extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'description', 'price', 'stock', 'category_id'];

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // You can also add a relationship to the Order if needed (many-to-many)
}
