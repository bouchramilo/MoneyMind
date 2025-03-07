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
    public function alearts()
    {
        return $this->hasMany(AleartConfig::class);
    }

    public function notification()
    {
        return $this->hasMany(Aleart::class);
    }
}
