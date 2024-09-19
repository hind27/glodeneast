<?php
namespace App\Models;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_price', 'status'];

    // An order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // You can add a many-to-many relationship between products and orders
    public function products()
    {
        return $this->belongsToMany(related: Product::class)->withPivot('quantity');
    }
}
