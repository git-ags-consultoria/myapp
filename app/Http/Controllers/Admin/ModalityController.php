<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    public function index()
    {
        $modalities = Modality::all();
        return view('admin.modalities.index', compact('modalities'));
    }

    public function create()
    {
        return view('admin.modalities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'acronym' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        Modality::create($validated);
        return redirect()->route('admin.modalities.index')->with('success', 'Modality created successfully.');
    }

    public function show(Modality $modality)
    {
        return view('admin.modalities.show', compact('modality'));
    }

    public function edit(Modality $modality)
    {
        return view('admin.modalities.edit', compact('modality'));
    }

    public function update(Request $request, Modality $modality)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'acronym' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        $modality->update($validated);
        return redirect()->route('admin.modalities.index')->with('success', 'Modality updated successfully.');
    }

    public function destroy(Modality $modality)
    {
        $modality->delete();
        return redirect()->route('admin.modalities.index')->with('success', 'Modality deleted.');
    }
}
