<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'email',
        'phone',
        'address',
        'notes',
        'dob'
    ];

    // Accessor for 'address'
    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true)['value'] ?? '',
            // set: fn($value) => json_encode(['value' => $value])
        );
    }

    // Accessor for 'notes'
    protected function notes(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            // set: fn($value) => json_encode($value)
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $return = "";
                if ($value === 'm') $return = "Male";
                if ($value === 'f') $return = "Female";
                if ($value === 'o') $return = "Other";
                return $return;
            }
        );
    }

    //    Relations
    public function photos()
    {
        $this->hasMany(CustomerPhoto::class, 'customer_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected static function booted()
    {
        // When a Project is soft-deleted
        static::deleting(function ($customer): void {
            if (!$customer->isForceDeleting()) {
                $customer->photos()->delete();
            }
        });

        // When a Project is restored
        static::restoring(function ($customer): void {
            $customer->photos()->withTrashed()->restore();
        });
    }
}
