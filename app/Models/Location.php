<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
    protected $fillable=[
        'longitude',
        'latitude',
        'users_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
