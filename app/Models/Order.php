<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'customer_id',
        'status',
        'total_amount',
        'advance_paid',
        'deilivery_date',
        'close_date',
        'notes',
    ];

    // relations
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
