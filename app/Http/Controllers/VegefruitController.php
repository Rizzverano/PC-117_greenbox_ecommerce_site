<?php

namespace App\Http\Controllers;

use App\Models\Vegefruit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VegefruitController extends Controller
{
    // Constants for configuration
    private const IMAGE_DISK = 'public';
    private const IMAGE_DIR = 'vegefruits';

    public function index(): View
    {
        $vegefruits = Vegefruit::latest()->paginate(10);
        return view('vegefruits.index', compact('vegefruits'));
    }

    public function create(): View
    {
        // dd(auth()->user()->role_id); // This will show the role_id and stop execution here
        return view('vegefruits.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'intro' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'ingred_one' => 'nullable|string|max:255',
            'ingred_two' => 'nullable|string|max:255',
            'ingred_three' => 'nullable|string|max:255',
            'ingred_four' => 'nullable|string|max:255',
            'ingred_five' => 'nullable|string|max:255',
            'ingred_six' => 'nullable|string|max:255',
            'ingred_seven' => 'nullable|string|max:255',
            'ingred_eight' => 'nullable|string|max:255',
            'ingred_nine' => 'nullable|string|max:255',
            'ingred_ten' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // dd($validated);
        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        Vegefruit::create($validated);

        return redirect()->route('vegefruits.index')
            ->with('success', 'Vegefruit created successfully!');
    }

    public function show(Vegefruit $vegefruit): View
    {
        return view('vegefruits.show', compact('vegefruit'));
    }

    public function edit(Vegefruit $vegefruit): View
    {
        return view('vegefruits.edit', compact('vegefruit'));
    }

    public function update(Request $request, Vegefruit $vegefruit): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'intro' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'ingred_one' => 'nullable|string|max:255',
            'ingred_two' => 'nullable|string|max:255',
            'ingred_three' => 'nullable|string|max:255',
            'ingred_four' => 'nullable|string|max:255',
            'ingred_five' => 'nullable|string|max:255',
            'ingred_six' => 'nullable|string|max:255',
            'ingred_seven' => 'nullable|string|max:255',
            'ingred_eight' => 'nullable|string|max:255',
            'ingred_nine' => 'nullable|string|max:255',
            'ingred_ten' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            $this->deleteImage($vegefruit->image);
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        $vegefruit->update($validated);

        return redirect()->route('vegefruits.index')
            ->with('success', 'Vegefruit updated successfully!');
    }

    public function destroy(Vegefruit $vegefruit): RedirectResponse
    {
        $this->deleteImage($vegefruit->image);
        $vegefruit->delete();

        return redirect()->route('vegefruits.index')
            ->with('success', 'Vegefruit deleted successfully!');
    }

    /**
     * Store image and return path
     */
    private function storeImage($image): string
    {
        $filename = 'vegefruit_' . time() . '.' . $image->getClientOriginalExtension();
        $path = self::IMAGE_DIR . '/' . $filename;

        // Store the original image
        Storage::disk(self::IMAGE_DISK)->put($path, file_get_contents($image));

        return $path;
    }

    /**
     * Delete image from storage
     */
    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk(self::IMAGE_DISK)->exists($path)) {
            Storage::disk(self::IMAGE_DISK)->delete($path);
        }
    }
}
