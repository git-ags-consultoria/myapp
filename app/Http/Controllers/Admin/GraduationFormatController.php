<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GraduationFormat;
use App\Models\Admin\Modality;
use Illuminate\Http\Request;

class GraduationFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formats = GraduationFormat::with('modality')
            ->orderBy('modality_id')
            ->orderBy('order')
            ->get();

        return view('admin.graduation_formats.index', compact('formats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modalities = Modality::orderBy('name')->get();

        return view('admin.graduation_formats.create', compact('modalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modality_id' => 'required|exists:modalities,id',
            'belt_name'   => 'required|string|max:255',
            'belt_color'  => 'required|string|max:20',
            'min_age'     => 'nullable|integer|min:0',
            'min_months'  => 'nullable|integer|min:0',
            'order'       => 'nullable|integer|min:0',
        ]);

        GraduationFormat::create($validated);

        return redirect()
            ->route('admin.graduation-formats.index')
            ->with('success', 'Graduation format created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GraduationFormat $graduationFormat)
    {
        $modalities = Modality::orderBy('name')->get();

        return view('admin.graduation_formats.edit', [
            'format' => $graduationFormat,
            'modalities' => $modalities,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GraduationFormat $graduationFormat)
    {
        $validated = $request->validate([
            'modality_id' => 'required|exists:modalities,id',
            'belt_name'   => 'required|string|max:255',
            'belt_color'  => 'required|string|max:20',
            'min_age'     => 'nullable|integer|min:0',
            'min_months'  => 'nullable|integer|min:0',
            'order'       => 'nullable|integer|min:0',
        ]);

        $graduationFormat->update($validated);

        return redirect()
            ->route('admin.graduation-formats.index')
            ->with('success', 'Graduation format updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GraduationFormat $graduationFormat)
    {
        $graduationFormat->delete();

        return redirect()
            ->route('admin.graduation-formats.index')
            ->with('success', 'Graduation format deleted successfully.');
    }
}
