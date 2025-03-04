<?php
namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\DepenseRecurrente;
use App\Services\GeminiService;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function index()
    {

        $depenses            = Depense::where("user_id", "=", Auth::user()->id)->with("categorie")->get();
        $depensesRecurrentes = DepenseRecurrente::where("user_id", "=", Auth::user()->id)->orderBy('date_reccurente', 'asc')->with("categorie")->get();
        $budget              = Auth::user()->Budget;

        $suggestions = $this->geminiService->getSuggestions($depenses, $depensesRecurrentes, $budget);

        return view("utilisateur/dashboard", ["suggestions" => $suggestions]);

    }
}
