<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CategorieController extends Controller
{
    // **********************************************************************************************************************************
    public function index()
    {
        $categories = Categorie::all();
        // dd($categories);
        return view('/admin/categories', compact('categories'));
    }

    // **********************************************************************************************************************************
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $user = Categorie::create([
            'title' => $request->title,
        ]);

        return redirect(route('categories.index', absolute: false));
    }

    // **********************************************************************************************************************************
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index');
    }
    // **********************************************************************************************************************************

    public function update(Request $request){
        $request->validate(rules: [
            'title' => ['required', 'string', 'max:255'],
        ]);

        $existeCategorie = Categorie::where('id', '=', $request->categorie_id)->first();

        $existeCategorie->update([
            'title' => $request->title,
        ]);
        return redirect()->route('categories.index');
    }
}
