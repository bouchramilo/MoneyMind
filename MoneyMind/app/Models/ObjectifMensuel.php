<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ObjectifMensuel extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'montant',
        'date_obj',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

