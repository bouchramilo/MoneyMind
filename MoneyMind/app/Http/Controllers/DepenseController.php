<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Categorie::all();

        $depenses = Depense::where("user_id", "=", Auth::user()->id)->with("categorie")->get();

        $totalDepenses = Auth::user()->depenses()->sum('prix');

        $depensesParCategorie =  Auth::user()->depenses()
            ->select('categorie_id', \DB::raw('SUM(prix) as total'))
            ->groupBy('categorie_id')
            ->with("categorie")->get();

            // dd($depensesParCategorie);

        return view("utilisateur/depenses", compact(["categories", "depenses", "totalDepenses", "depensesParCategorie"]));

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
            'nom'          => ['required', 'string', 'max:255'],
            'prix'         => ['required', 'numeric'],
            'categorie_id' => ['nullable', 'integer', 'exists:categories,id'],
        ]);

        // dd(Auth::id());

        Depense::create([
            'nom'          => $request->nom,
            'prix'         => $request->prix,
            'categorie_id' => $request->categorie_id,
            'user_id'      => Auth::id(),
        ]);

        $user = Auth::user();
        Auth::user()->update([
            'Budjet' => $user->Budjet - $request->prix,
        ]);

        return redirect()->route('utilisateur.depenses');
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
        $depense = Depense::findOrFail($id);
        $depense->delete();

        return redirect()->route('utilisateur.depenses');
    }
}
