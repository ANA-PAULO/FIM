<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emergencia extends Model
{
    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'alert_type',
        'message',
        'users_id',
    ];

    /**
     * Relacionamento: Emergência pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
