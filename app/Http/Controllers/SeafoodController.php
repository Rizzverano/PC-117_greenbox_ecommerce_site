<?php

namespace App\Http\Controllers;

use App\Models\Seafood;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SeafoodController extends Controller
{
    // Constants for configuration
    private const IMAGE_DISK = 'public';
    private const IMAGE_DIR = 'seafoods';

    public function index(): View
    {
        $seafoods = Seafood::latest()->paginate(10);
        return view('seafoods.index', compact('seafoods'));
    }

    public function create(): View
    {
        return view('seafoods.create');
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

        Seafood::create($validated);

        return redirect()->route('seafoods.index')
            ->with('success', 'Seafood created successfully!');
    }

    public function show(Seafood $seafood): View
    {
        return view('seafoods.show', compact('seafood'));
    }

    public function edit(Seafood $seafood): View
    {
        return view('seafoods.edit', compact('seafood'));
    }

    public function update(Request $request, Seafood $seafood): RedirectResponse
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
            $this->deleteImage($seafood->image);
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        $seafood->update($validated);

        return redirect()->route('seafoods.index')
            ->with('success', 'Seafood updated successfully!');
    }

    public function destroy(Seafood $seafood): RedirectResponse
    {
        $this->deleteImage($seafood->image);
        $seafood->delete();

        return redirect()->route('seafoods.index')
            ->with('success', 'Seafood deleted successfully!');
    }

    /**
     * Store image and return path
     */
    private function storeImage($image): string
    {
        $filename = 'seafood_' . time() . '.' . $image->getClientOriginalExtension();
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
