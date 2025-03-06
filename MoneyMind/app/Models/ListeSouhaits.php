<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;


class ListeSouhaits extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prix',
        'priorite',
        'user_id',
        'prix_actuel',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
