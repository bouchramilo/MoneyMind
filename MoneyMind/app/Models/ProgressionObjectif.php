<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProgressionObjectif extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'progression_objectifs';

    protected $fillable = [
        'objectif_id',
        'montant_epargne_actuel',
        'pourcentage_atteint',
        'date_mise_a_jour',
    ];

    public function objectif()
    {
        return $this->belongsTo(ObjectifMensuel::class, 'objectif_id');
    }
}
