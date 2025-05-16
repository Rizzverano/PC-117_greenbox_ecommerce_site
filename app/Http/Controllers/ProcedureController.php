<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedure;
use Illuminate\Support\Facades\Storage;

class ProcedureController extends Controller
{
    public function create()
    {
        return view('procedures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'type' => 'required|string|max:255',
            'guide' => 'required|file|mimes:pdf|max:5120',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $guidePath = $request->file('guide')->store('guides', 'public');

        Procedure::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'type' => $validated['type'],
            'guide' => $guidePath,
        ]);

        return response()->json(['message' => 'Stored successfully']);
    }

    public function index()
    {
        $procedures = Procedure::all();
        return view('manager.sections.procedures', compact('procedures'));
    }

    public function show($id)
    {
        $procedure = Procedure::findOrFail($id);
        return view('procedures.show', compact('procedure'));
    }

    public function edit($id)
    {
        $procedure = Procedure::findOrFail($id);
        return view('procedures.edit', compact('procedure'));
    }

    public function update(Request $request, $id)
    {
        $procedure = Procedure::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'guide' => 'nullable|mimes:pdf|max:4096',
        ]);

        $procedure->name = $request->name;
        $procedure->type = $request->type;

        if ($request->hasFile('image')) {
            $procedure->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('guide')) {
            $procedure->guide = $request->file('guide')->store('guides', 'public');
        }

        $procedure->save();

        return response()->json(['message' => 'Updated successfully']);
    }

    public function destroy($id)
    {
        $procedure = Procedure::findOrFail($id);

        // Delete the associated image and guide files
        Storage::disk('public')->delete($procedure->image);
        Storage::disk('public')->delete($procedure->guide);

        $procedure->delete();

        // ✅ Return JSON response for AJAX
        return response()->json(['message' => 'Procedure deleted successfully.']);
    }
}
