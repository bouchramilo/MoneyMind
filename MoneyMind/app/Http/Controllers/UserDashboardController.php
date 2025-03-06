<?php
namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\DepenseRecurrente;
use App\Models\ListeSouhaits;
use App\Models\ObjectifMensuel;
use App\Services\GeminiService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function index()
    {

        // IA gemini **********
        $depenses            = Depense::where("user_id", "=", Auth::user()->id)->with("categorie")->get();
        $depensesRecurrentes = DepenseRecurrente::where("user_id", "=", Auth::user()->id)->orderBy('date_reccurente', 'asc')->with("categorie")->get();
        $budget              = Auth::user()->Budget;

        $suggestions = $this->geminiService->getSuggestions($depenses, $depensesRecurrentes, $budget);
        // *********************
        $depensesParCategorie =  Auth::user()->depenses()
            ->select('categorie_id', \DB::raw('SUM(prix) as total'))
            ->groupBy('categorie_id')
            ->with("categorie")->get();
        // *********************
        $depensesReccParCategorie = Auth::user()->depenses_reccurentes()
            ->select('categorie_id', \DB::raw('SUM(prix) as total'))
            ->groupBy('categorie_id')
            ->with("categorie")->get();
        // *********************
        $obj_current = ObjectifMensuel::where("user_id", "=", Auth::id())->wherenull("date_obj_fin")->first();

        // *********************
        $prochainPaiements = DepenseRecurrente::where('date_reccurente', '>=', Carbon::today())
        ->orderBy('date_reccurente', 'asc')
        ->take(3)->get();

        // dd($prochainPaiements);
        // *********************
        $listeSouhaits = ListeSouhaits::where("user_id", "=", Auth::user()->id)->get();

        // *********************
        $data = ["suggestions" => $suggestions,
                 "listeSouhaits" => $listeSouhaits,
                 'obj_current' => $obj_current,
                 'depensesParCategorie' => $depensesParCategorie,
                 'depensesReccParCategorie' => $depensesReccParCategorie,
                 'prochainPaiements' => $prochainPaiements,
                ];

        return view("utilisateur/dashboard", $data);

    }
}
