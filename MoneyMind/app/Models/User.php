<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'salaire',
        'date_credit',
        'Budjet',
    ];

    protected $casts = [
        'last_login' => 'datetime',
        'date_salaire' => 'date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    }


    // les relations
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }

    public function depenses_reccurentes()
    {
        return $this->hasMany(DepenseRecurrente::class);
    }

    public function list_souhaits()
    {
        return $this->hasMany(ListeSouhaits::class);
    }

    public function objectifs()
    {
        return $this->hasMany(ObjectifMensuel::class);
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
