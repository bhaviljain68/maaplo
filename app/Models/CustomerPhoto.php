<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerPhoto extends Model
{
    use SoftDeletes;

    protected $table = 'customer_photos';
    protected $fillable = [
        'customer_id',
        'image_url',
        'label'
    ];

    public function assetUrl(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => asset($value),
        );
    }

    // Relations
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
