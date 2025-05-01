<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VegeFruit;
use App\Models\Meat;
use App\Models\Seafood;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $search = $request->input('search');

        $vegefruits = VegeFruit::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        $meats = Meat::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        $seafoods = Seafood::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        $products = collect()->merge($vegefruits)->merge($meats)->merge($seafoods);

        return view('navigation.shop', compact('products', 'search'));
    }

    public function filter(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $modelMap = [
            'vegefruit' => VegeFruit::class,
            'meat' => Meat::class,
            'seafood' => Seafood::class,
        ];

        $products = collect();

        if ($category === 'all') {
            foreach ($modelMap as $model) {
                $products = $products->merge(
                    $model::when($search, function ($query, $search) {
                        return $query->where('name', 'like', "%{$search}%");
                    })->get()
                );
            }
        } elseif (isset($modelMap[$category])) {
            $products = $modelMap[$category]::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })->get();
        }

        $html = view('partials.shop-products', compact('products'))->render();
        return response()->json(['html' => $html]);
    }

}
