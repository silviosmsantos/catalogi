<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::where('company_id', Auth::user()->company_id)->get();
        return view('Catalogs.catalogs', compact('catalogs'));
    }

    public function create()
    {
        return view('Catalogs.catalogs-create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Catalog::create([
            'company_id' => Auth::user()->company_id,
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => true,
        ]);

        return redirect()->route('catalogs.index')->with('success', 'Catálogo criado com sucesso!');
    }
}
