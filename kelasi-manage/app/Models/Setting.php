<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::updated(function () {
            \Cache::forget('settings');
        });

        static::created(function () {
            \Cache::forget('settings');
        });
    }
}