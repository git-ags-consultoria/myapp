<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Federation;
use Illuminate\Http\Request;

class FederationController extends Controller
{
    public function index()
    {
        $federations = Federation::orderBy('name')->paginate(10);
        return view('admin.federations.index', compact('federations'));
    }

    public function create()
    {
        return view('admin.federations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:federations,name',
            'acronym' => 'required|string|max:10',
            'website' => 'nullable|url|max:255',
        ]);

        Federation::create($data);
        return redirect()->route('admin.federations.index')->with('success', 'Federation created successfully!');
    }

    public function show(Federation $federation)
    {
        return view('admin.federations.show', compact('federation'));
    }

    public function edit(Federation $federation)
    {
        return view('admin.federations.edit', compact('federation'));
    }

    public function update(Request $request, Federation $federation)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:federations,name,' . $federation->id,
            'acronym' => 'required|string|max:10',
            'website' => 'nullable|url|max:255',
        ]);

        $federation->update($data);
        return redirect()->route('admin.federations.index')->with('success', 'Federation updated successfully!');
    }

    public function destroy(Federation $federation)
    {
        $federation->delete();
        return redirect()->route('admin.federations.index')->with('success', 'Federation deleted successfully!');
    }
}
