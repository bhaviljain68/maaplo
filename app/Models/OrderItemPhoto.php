<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemPhoto extends Model
{
    protected $table = 'order_item_photos';

    Use SoftDeletes;

    protected $fillable = [
        'image_url',
        'label',
    ];

    // Relationships

    /**
     * Get the order item that owns the photo.
     */
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }   
}
