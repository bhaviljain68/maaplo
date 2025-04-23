<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

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
    ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
