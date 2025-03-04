<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AddSalaryCommand extends Command
{
    protected $signature   = 'salary:add';
    protected $description = "Ajoute le salaire des utilisateurs à la date définie chaque mois.";

    public function handle()
    {
        $today = now()->format('Y-m-d');

        $users = User::whereDate('date_credit', $today)->get();

        foreach ($users as $user) {
            $user->Budjet += $user->salaire;

            $user->date_credit = now()->addMonth()->format('Y-m-d');
            $user->save();

            Log::info("Salaire ajouté pour l'utilisateur : {$user->name} à la date {$today}");
            $this->info("Salaire ajouté pour {$user->name}");
        }

        return 0;
    }
}
