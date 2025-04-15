<?php

namespace App\Http\Controllers;

use App\Models\Meat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MeatController extends Controller
{
    // Constants for configuration
    private const IMAGE_DISK = 'public';
    private const IMAGE_DIR = 'meats';

    public function index(): View
    {
        $meats = Meat::latest()->paginate(5);
        return view('meats.index', compact('meats'));
    }

    public function create(): View
    {
        return view('meats.create');
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

        Meat::create($validated);

        return redirect()->route('meats.index')
            ->with('success', 'Meat created successfully!');
    }

    public function show(Meat $meat): View
    {
        return view('meats.show', compact('meat'));
    }

    public function edit(Meat $meat): View
    {
        return view('meats.edit', compact('meat'));
    }

    public function update(Request $request, Meat $meat): RedirectResponse
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
            $this->deleteImage($meat->image);
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        $meat->update($validated);

        return redirect()->route('meats.index')
            ->with('success', 'Meat updated successfully!');
    }

    public function destroy(Meat $meat): RedirectResponse
    {
        $this->deleteImage($meat->image);
        $meat->delete();

        return redirect()->route('meats.index')
            ->with('success', 'Meat deleted successfully!');
    }

    /**
     * Store image and return path
     */
    private function storeImage($image): string
    {
        $filename = 'meat_' . time() . '.' . $image->getClientOriginalExtension();
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
