<?php
namespace App\Http\Controllers;

use App\Models\ObjectifMensuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjectifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objectifs   = ObjectifMensuel::where("user_id", "=", Auth::id())->orderBy("date_obj_debut", "desc")->with("progressions")->get();
        $obj_current = ObjectifMensuel::where("user_id", "=", Auth::id())->wherenull("date_obj_fin")->first();

        if ($obj_current) {
            $progressions = $obj_current->progressions()->orderBy("date_mise_a_jour", "asc")->get();
        } else {
            $progressions = collect() ;
        }
        return view("utilisateur/objectifs", ["objectifs" => $objectifs, "objectif_current" => $obj_current, "progressions" => $progressions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'montant' => ['required', 'numeric'],
        ]);

        $userId       = Auth::id();
        $moisCourrant = now()->month;
        $anneeCourant = now()->year;

        $existeObjectif = ObjectifMensuel::where('user_id', $userId)
            ->wherenull('date_obj_fin')
            // ->whereYear('date_obj_debut', $anneeCourant)
            ->first();

        if ($existeObjectif) {
            $existeObjectif->update([
                'montant' => $request->montant,
            ]);
        } else {
            ObjectifMensuel::create([
                'montant'        => $request->montant,
                'date_obj_debut' => now(),
                'user_id'        => $userId,
                'montant_actuel' => 0,
            ]);
        }

        return redirect()->route('utilisateur.objectifs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
