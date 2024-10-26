<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'order_status';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'status_name',
        'description',
    ];

    /**
     * Relationship with the Order model.
     * This assumes that each order is associated with one order status.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'order_status_id');
    }
}
