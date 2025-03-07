<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;


class Aleart extends Model
{
    use HasFactory, Notifiable;

    protected $table = "alearts";

    protected $fillable = [
        'categorie_id',
        'user_id',
        'mssg',
    ];

    protected $casts = [
        'dateTime_aleart' => 'datetime',
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
