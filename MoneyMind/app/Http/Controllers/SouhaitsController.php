<?php
namespace App\Http\Controllers;

use App\Models\ListeSouhaits;
use App\Models\ObjectifMensuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SouhaitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeSouhaits = ListeSouhaits::where("user_id", "=", Auth::user()->id)->get();

        $totalSouhaits = Auth::user()->list_souhaits()->sum('prix');

        $obj_current = ObjectifMensuel::where("user_id", "=", Auth::id())->wherenull("date_obj_fin")->first();
        $montant_current = $obj_current->montant_actuel ?? 0;

        return view("utilisateur/souhaits", compact(["listeSouhaits", "totalSouhaits", "montant_current"]));
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
            'nom'      => ['required', 'string', 'max:255'],
            'prix'     => ['required', 'numeric'],
            'priorite' => ['required', 'string', 'max:255'],
        ]);

        // dd(Auth::id());

        ListeSouhaits::create([
            'nom'      => $request->nom,
            'prix'     => $request->prix,
            'priorite' => $request->priorite,
            'user_id'  => Auth::id(),
        ]);

        return redirect()->route('utilisateur.souhaits');
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

    public function update(Request $request)
    {
        $request->validate([
            'nom'      => ['required', 'string', 'max:255'],
            'prix'     => ['required', 'numeric'],
            'priorite' => ['required', 'string', 'max:255'],
        ]);

        $souhait = ListeSouhaits::findOrFail($request->souhaits_id);

        $souhait->update([
            'nom'      => $request->nom,
            'prix'     => $request->prix,
            'priorite' => $request->priorite,
        ]);

        return redirect()->route('utilisateur.souhaits');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $depense = ListeSouhaits::findOrFail($id);
        $depense->delete();

        return redirect()->route('utilisateur.souhaits');
    }
}
