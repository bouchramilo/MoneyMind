<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Categorie extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
    ];

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}
