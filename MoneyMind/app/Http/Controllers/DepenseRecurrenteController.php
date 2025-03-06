<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\DepenseRecurrente;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseRecurrenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Categorie::all();

        $depenses_recc = DepenseRecurrente::where("user_id", "=", Auth::user()->id)->orderBy('date_reccurente', 'asc')->with("categorie")->get();

        $totalDepenses = Auth::user()->depenses_reccurentes()->sum('prix');

        $depensesParCategorie = Auth::user()->depenses_reccurentes()
            ->select('categorie_id', \DB::raw('SUM(prix) as total'))
            ->groupBy('categorie_id')
            ->with("categorie")->get();

        $prochainPaiement = DepenseRecurrente::where('date_reccurente', '>=', Carbon::today())
            ->orderBy('date_reccurente', 'asc')
            ->first();

        // dd($depensesParCategorie);

        return view("utilisateur/depenses_reccurentes", compact(["categories", "depenses_recc", "totalDepenses", "depensesParCategorie", "prochainPaiement"])); // , "depenses", "totalDepenses", "depensesParCategorie"

        // return view("utilisateur/depenses_reccurentes");
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
        // dd($request);

        $request->validate([
            'nom'             => ['required', 'string', 'max:255'],
            'prix'            => ['required', 'numeric'],
            'categorie_id'    => ['nullable', 'integer', 'exists:categories,id'],
            'date_reccurente' => ['required', 'date', ''],
        ]);

        DepenseRecurrente::create([
            'nom'             => $request->nom,
            'prix'            => $request->prix,
            'categorie_id'    => $request->categorie_id,
            'user_id'         => Auth::id(),
            'date_reccurente' => $request->date_reccurente,
        ]);

        // $user = Auth::user();
        // Auth::user()->update([
        //     'Budjet' => $user->Budjet - $request->prix,
        // ]);

        return redirect()->route('utilisateur.reccurente');
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
        // dd($request);
        $request->validate([
            'nom'      => ['required', 'string', 'max:255'],
            'prix'     => ['required', 'numeric'],
            'catgorie_id' => ['nullable', 'integer', 'exists:categories,id'],
            'date_reccurente' => ['required', 'date', ''],
        ]);

        $souhait = DepenseRecurrente::findOrFail($request->depense_id);

        $souhait->update([
            'nom'      => $request->nom,
            'prix'     => $request->prix,
            'categorie_id' => $request->categorie_id,
            'date_reccurente' => $request->date_reccurente,
        ]);

        return redirect()->route('utilisateur.reccurente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $depense = DepenseRecurrente::findOrFail($id);
        $depense->delete();

        return redirect()->route('utilisateur.reccurente');
    }
}
