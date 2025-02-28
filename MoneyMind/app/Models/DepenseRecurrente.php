<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DepenseRecurrente extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'depenses_reccurentes';

    protected $fillable = [
        'nom',
        'prix',
        'categorie_id',
        'user_id',
        'date_reccurente',
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
