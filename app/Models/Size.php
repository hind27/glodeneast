<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Size extends Model
{
    use HasFactory;

    protected $fillable = ['size']; // Fillable fields

    /**
     * Get the product sizes associated with the size.
     */
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
