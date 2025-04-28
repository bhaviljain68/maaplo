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

    protected static function booted()
{
    // When a Project is soft-deleted
    static::deleting(function ($customer): void {
        if ($customer && !$customer->isForceDeleting()) {
            if ($customer->photos()->exists()) {
                $customer->photos()->delete(); // Soft delete related photos
            }
        }
    });

    // When a Project is restored
    static::restoring(function ($customer): void {
        $customer->photos()->withTrashed()->restore(); // Restore soft deleted photos
    });
}

    // Relations
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function photos()
{
    return $this->hasMany(CustomerPhoto::class, 'customer_id');
}
}
