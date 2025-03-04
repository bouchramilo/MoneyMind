<?php

namespace App\Console\Commands;

use App\Models\DepenseRecurrente;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DepensesRecurrentesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:depenses_recurrentes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Effectue le paiement des dépenses récurrentes à la date spécifiée';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->format('Y-m-d');
        $depensesReccu = DepenseRecurrente::whereDate('date_reccurente', $today)->get();

        foreach ($depensesReccu as $depenseRecc){
            $user = User::find($depenseRecc->user_id);

            if($user){
                if ($user->Budjet >= $depenseRecc->prix) {
                    $user->Budjet -= $depenseRecc->prix;
                    $user->save();

                    $depenseRecc->date_reccurente = now()->addMonth()->format('Y-m-d');
                    $depenseRecc->save();

                    Log::info("Dépense enregistrée et budget mis à jour : {$depenseRecc->nom} - {$depenseRecc->prix}€");
                    $this->info("Dépense enregistrée pour {$user->name} : {$depenseRecc->nom} ({$depenseRecc->prix}€)");
                } else {
                    Log::warning("Budget insuffisant pour {$user->name} : {$depenseRecc->nom} - {$depenseRecc->prix}€");
                    $this->warn("Budget insuffisant pour {$user->name} : {$depenseRecc->nom} ({$depenseRecc->prix}€)");
                }
            }
        }
    }
}
