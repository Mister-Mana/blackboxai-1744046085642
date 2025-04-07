<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address', 
        'phone',
        'email',
        'license_key',
        'subscription_expiry',
        'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function classes() 
    {
        return $this->hasMany(SchoolClass::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }
}