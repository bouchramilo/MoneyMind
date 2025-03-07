<?php
namespace App\Console\Commands;

use App\Models\AleartConfig;
use App\Models\ObjectifMensuel;
use App\Models\ProgressionObjectif;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AddSalaryCommand extends Command
{
    protected $signature   = 'salary:add';
    protected $description = "Ajoute le salaire des utilisateurs à la date définie et vérifie si les objectifs sont atteints.";

    public function handle()
    {
        $today = now()->format('Y-m-d');

        $users = User::whereDate('date_credit', $today)->get();

        foreach ($users as $user) {
            $objectifEnCours = ObjectifMensuel::where('user_id', $user->id)
                ->whereNull('date_obj_fin')
                ->orderBy('date_obj_debut', 'desc')
                ->first();

            if ($objectifEnCours) {
                $progressions               = ProgressionObjectif::where('objectif_id', $objectifEnCours->id)->get();
                $derniereProgression        = $progressions->last();
                $montantDerniereProgression = 0;
                if ($derniereProgression) {
                    $montantDerniereProgression = $derniereProgression->montant_epargne_actuel;
                }

                $restepourCompelterObj = $objectifEnCours->montant - $montantDerniereProgression;

                if ($user->Budjet >= $restepourCompelterObj) {
                    ProgressionObjectif::create([
                        'objectif_id'            => $objectifEnCours->id,
                        'montant_epargne_actuel' => $restepourCompelterObj + $montantDerniereProgression,
                        'pourcentage_atteint'    => 100,
                        'date_mise_a_jour'       => now(),
                    ]);

                    $objectifEnCours->montant_actuel = $restepourCompelterObj + $montantDerniereProgression;
                    $objectifEnCours->save();

                    $user->Budjet -= $restepourCompelterObj;

                    $objectifEnCours->date_obj_fin = $today;
                    $objectifEnCours->save();

                    Log::info("Objectif {$objectifEnCours->id} terminé pour l'utilisateur : {$user->name}. Montant atteint : {$objectifEnCours->montant}");
                    $this->info("Objectif {$objectifEnCours->id} terminé pour {$user->name}. Montant atteint : {$objectifEnCours->montant}");
                } else {
                    ProgressionObjectif::create([
                        'objectif_id'            => $objectifEnCours->id,
                        'montant_epargne_actuel' => $user->Budjet + $montantDerniereProgression,
                        'pourcentage_atteint'    => (($user->Budjet + $montantDerniereProgression) / $objectifEnCours->montant) * 100,
                        'date_mise_a_jour'       => now(),
                    ]);

                    $objectifEnCours->montant_actuel = $user->Budjet + $montantDerniereProgression;
                    $objectifEnCours->save();

                    $user->Budjet = 0;

                    if (($user->Budjet + $montantDerniereProgression) >= $objectifEnCours->montant) {
                        $objectifEnCours->date_obj_fin = $today;
                        $objectifEnCours->save();
                    }

                    Log::info("Salaire ajouté pour l'utilisateur : {$user->name} à la date {$today}. Objectif en cours : {$objectifEnCours->id}");
                    $this->info("Salaire ajouté pour {$user->name}. Objectif en cours : {$objectifEnCours->id}");
                }
            } else {
                Log::info("Salaire ajouté pour l'utilisateur : {$user->name} à la date {$today}. Aucun objectif en cours.");
                $this->info("Salaire ajouté pour {$user->name}. Aucun objectif en cours.");
            }

            $user->Budjet += $user->salaire;

            $user->date_credit = now()->addMonth()->format('Y-m-d');
            $user->save();

            $configInitialiser = AleartConfig::where('user_id', $user->id)->get();
            foreach ($configInitialiser as $aleart) {
                $aleart->pourcentage_actuel = 0.00 ;
                $aleart->save();
            }
        }

        return 0;
    }
}
