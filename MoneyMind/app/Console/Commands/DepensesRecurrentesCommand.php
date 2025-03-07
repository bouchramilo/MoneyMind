<?php
namespace App\Console\Commands;

use App\Models\Aleart;
use App\Models\AleartConfig;
use App\Models\DepenseRecurrente;
use App\Models\User;
use App\Notifications\aleartNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

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
        $today         = now()->format('Y-m-d');
        $depensesReccu = DepenseRecurrente::whereDate('date_reccurente', $today)->get();

        foreach ($depensesReccu as $depenseRecc) {
            $user = User::find($depenseRecc->user_id);

            if ($user) {


                if ($user->Budjet >= $depenseRecc->prix) {

                    $user->Budjet -= $depenseRecc->prix;
                    $user->save();

                    // seuil par catégorie
                    $config = AleartConfig::where('user_id', $user->id)->where('categorie_id', '=', $depenseRecc->categorie_id)->first();
                    $config->pourcentage_actuel = $config->pourcentage_actuel + ($depenseRecc->prix / $user->salaire) * 100;
                    $config->save();
                    if ($config->pourcentage_actuel >= $config->pourcentage) {
                        $message = "Vous avez dépassé {$config->pourcentage} de votre seuil par catégorie '{$config->categorie->title}' déjà défini (Votre pourcentage maintenant {$config->pourcentage_actuel}) .";
                        Notification::send($user, new aleartNotification($message));

                        //

                        Aleart::create([
                            'mssg'          => $message,
                            'categorie_id' => $config->categorie->id,
                            'user_id'      => $user->id,
                        ]);
                    }

                    // seuil global
                    $seuilglobal = AleartConfig::where('user_id', $user->id)->where('seuilType', '=', 'seuil_global')->first();
                    $seuilglobal->pourcentage_actuel = $seuilglobal->pourcentage_actuel + ($depenseRecc->prix / $user->salaire) * 100;
                    $seuilglobal->save();
                    if ($seuilglobal->pourcentage_actuel >= $seuilglobal->pourcentage) {
                        $message = "Vous avez dépassé {$seuilglobal->pourcentage} de votre seuil global. (Votre pourcentage maintenant {$seuilglobal->pourcentage_actuel}) .";
                        Notification::send($user, new aleartNotification($message));

                        //
                        Aleart::create([
                            'mssg'          => $message,
                            'user_id'      => $user->id,
                        ]);
                    }

                    // date prochaine paymenet
                    $depenseRecc->date_reccurente = now()->addMonth()->format('Y-m-d');
                    $depenseRecc->save();

                    $message = "Dépense enregistrée et budget mis à jour : {$depenseRecc->nom} - {$depenseRecc->prix}€ à {$depenseRecc->nom} .";
                    Notification::send($user, new aleartNotification($message));

                    Log::info("Dépense enregistrée et budget mis à jour : {$depenseRecc->nom} - {$depenseRecc->prix}€");
                    $this->info("Dépense enregistrée pour {$user->name} : {$depenseRecc->nom} ({$depenseRecc->prix}€)");
                } else {

                    $message = "Budget insuffisant pour {$user->name} : {$depenseRecc->nom} - {$depenseRecc->prix}€.";
                    Notification::send($user, new aleartNotification($message));

                    Log::warning("Budget insuffisant pour {$user->name} : {$depenseRecc->nom} - {$depenseRecc->prix}€");
                    $this->warn("Budget insuffisant pour {$user->name} : {$depenseRecc->nom} ({$depenseRecc->prix}€)");
                }
            }
        }
    }
}
