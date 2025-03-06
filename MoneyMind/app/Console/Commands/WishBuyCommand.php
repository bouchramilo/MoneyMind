<?php
namespace App\Console\Commands;

use App\Models\ListeSouhaits;
use App\Models\ObjectifMensuel;
use App\Models\User;
use Illuminate\Console\Command;
use Log;

class WishBuyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:buy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // $today = now()->format('Y-m-d');

        // $users = User::whereDate('date_credit', $today)->get();

        // foreach ($users as $user) {
        //     $objectifEnCours = ObjectifMensuel::where('user_id', $user->id)
        //         ->whereNull('date_obj_fin')
        //         ->orderBy('date_obj_debut', 'desc')
        //         ->first();

        //         $wishList = ListeSouhaits::where('user_id', $user->id)->where('prix', '>' , 'prix_actuel')->get() ?? collect();

        //     if ($objectifEnCours) {
        //         foreach ($wishList as $wish) {
        //             $wish->prix_actuel = $objectifEnCours->montant_actuel;
        //             $wish->save();
        //             $objectifEnCours->montant_actuel -= $wish->prix_actuel;
        //         }




        //     } else {
        //         Log::info("wish list : {$user->name} , {$today}");
        //         $this->info("{$user->name}.");
        //     }

        //     $user->Budjet += $user->salaire;

        //     $user->date_credit = now()->addMonth()->format('Y-m-d');
        //     $user->save();
        // }

        // return 0;

    }
}
