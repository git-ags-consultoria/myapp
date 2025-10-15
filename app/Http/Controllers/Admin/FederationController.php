<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Federation;
use Illuminate\Http\Request;

class FederationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $federations = Federation::all();
        return view('admin.federations.index', compact('federations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.federations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
            'acronym' => 'required|string|max:200|unique:federations',
            'website' => 'nullable|string|max:200',
        ]);

        Federation::create($validatedData);

        return redirect()->route('admin.federations.index')
            ->with('sucess', 'Federação cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Federation $federation)
    {
        return view('admin.federations.show', compact('federation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Federation $federation)
    {
        return view('admin.federations.edit', compact('federation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Federation $federation)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
            'acronym' => 'required|string|max:200|unique:federations',
            'website' => 'nullable|string|max:200',
        ]);

        $federation->update($validatedData);
        return redirect()->route('admin.federations.index')
            ->with('sucess', 'Federação atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Federation $federation)
    {
        //
    }
}
