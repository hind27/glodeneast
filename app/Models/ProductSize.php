<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    // If the pivot table doesn't have timestamps, disable them
    public $timestamps = false;

    // Define the table name if it doesn't follow the naming convention
    protected $table = 'product_size';

    // Fillable fields (optional, based on your use case)
    protected $fillable = ['product_id', 'size_id'];

    /**
     * Relationship with the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }


}
