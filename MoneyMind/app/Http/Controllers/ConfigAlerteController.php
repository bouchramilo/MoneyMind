<?php
namespace App\Http\Controllers;

use App\Models\Aleart;
use App\Models\AleartConfig;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ConfigAlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $aleartNotification = Aleart::where("user_id", Auth::user()->id)->orderBy("created_at", "desc")->get();
        $categories         = Categorie::all();
        $configs            = AleartConfig::where("user_id", "=", Auth::user()->id)->where("seuilType", "=", "seuil_categorie")->get();
        $global             = AleartConfig::where("user_id", "=", Auth::user()->id)->where("seuilType", "=", "seuil_global")->get();
// dd($global);
        return view("utilisateur/configuration", compact(["categories", "configs", "global", "aleartNotification"]));
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
        if ($request->seuilType === "seuil_categorie") {
            $request->validate([
                'categorie_id' => [
                    'required',
                    'exists:categories,id',
                    Rule::unique('configalearts')->where(function ($query) {
                        return $query->where('user_id', auth()->id());
                    }),
                ],
                'pourcentage'  => 'required|numeric|min:1|max:100',
            ]);

            AleartConfig::create([
                'user_id'      => auth()->id(),
                'categorie_id' => $request->categorie_id,
                'seuilType'    => $request->seuilType,
                'pourcentage'  => $request->pourcentage,
            ]);
        } else {
            $request->validate([
                'pourcentage' => 'required|numeric|min:1|max:100',
                // 'seuilType'   => [
                //     'required',
                //     Rule::unique('configalearts')->where(function ($query) {
                //         return $query->where('user_id', auth()->id());
                //     }),
                // ],
            ]);

            $existe = AleartConfig::where('user_id', '=', Auth::user()->id)->where('seuilType', '=', $request->seuilType)->first();

            if ($existe) {
                $existe->update([
                    'pourcentage' => $request->pourcentage,
                ]);
            } else {
                AleartConfig::create([
                    'user_id'     => auth()->id(),
                    'seuilType'   => $request->seuilType,
                    'pourcentage' => $request->pourcentage,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Configuration enregistrée avec succès.');
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
            'pourcentage' => 'required|numeric|min:1|max:100',
        ]);

        $existeConfig = AleartConfig::where('user_id', '=', Auth::user()->id)->where('id', '=', $request->config_id)->first();

        $existeConfig->update([
            'pourcentage' => $request->pourcentage,
        ]);
        return redirect()->route('utilisateur.configuration');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notifi = Aleart::findOrFail($id);
        $notifi->delete();

        return redirect()->route('utilisateur.configuration');
    }
}
