<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ObjectifMensuel extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'objectifs_mensuels';

    protected $fillable = [
        'montant',
        'date_obj_debut',
        'user_id',
        'montant_actuel',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function progressions()
    {
        return $this->hasMany(ProgressionObjectif::class, 'objectif_id');
    }
}

