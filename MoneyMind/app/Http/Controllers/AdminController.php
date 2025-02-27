<?php
namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    // *****************************************************************************************************************************
    public function index()
    {
        // selectionner toutes les utilisateurs
        $users = User::where('role', '!=', 'Admin')->paginate(10);

        // selectionner toutes les utilisateurs inactifs
        $twoMonthsAgo  = Carbon::now()->subMonths(2);
        $usersInactifs = User::where('role', '!=', 'Admin')
            ->where('last_login', '<=', $twoMonthsAgo)
            ->paginate(10);

        // compter les nouveaux users dans ce mois
        $users_last_mois = User::where('role', '!=', 'Admin')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        //
        $revenuMensuelMoyen = round(User::where('role', '!=', 'Admin')->avg('salaire'), 2);

        return view("admin/dashboard", compact(["users", 'usersInactifs', 'users_last_mois', 'revenuMensuelMoyen']));
    }

    // *****************************************************************************************************************************
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect(route('admin.utilisateurs'));
    }

    

}
