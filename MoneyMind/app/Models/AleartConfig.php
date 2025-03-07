<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AleartConfig extends Model
{
    use HasFactory, Notifiable;

    protected $table = "configalearts";

    protected $fillable = [
        'categorie_id',
        'user_id',
        'pourcentage',
        'seuilType',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
