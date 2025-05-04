<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('id');
        $productType = $request->input('type');
        $productModel = '\\App\\Models\\' . ucfirst($productType);

        if (!class_exists($productModel)) {
            return response()->json(['message' => 'Invalid product type'], 400);
        }

        $product = $productModel::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if (auth()->check()) {
            $cartItem = CartItem::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'type' => $productType,
                    'product_id' => $productId,
                ],
                [
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                ]
            );

            $cartItem->increment('quantity');
            return response()->json([
                'success' => true,
                'message' => 'Added to cart (DB)'
            ]);

        }

        $cart = session()->get('cart', []);
        $key = $productType . '_' . $productId;

        $cart[$key]['quantity'] = ($cart[$key]['quantity'] ?? 0) + 1;
        $cart[$key]['id'] = $productId;
        $cart[$key]['type'] = $productType;
        $cart[$key]['name'] = $product->name;
        $cart[$key]['price'] = $product->price;
        $cart[$key]['image'] = $product->image;

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Added to cart (session)',
            'cart' => $cart
        ]);

    }

    public function updateQuantity(Request $request)
    {
        $key = $request->input('key');
        $quantity = max(1, (int) $request->quantity);

        if (auth()->check()) {
            [$type, $id] = explode('_', $key);
            $cartItem = CartItem::where('user_id', auth()->id())
                ->where('type', $type)
                ->where('product_id', $id)
                ->first();

            if (!$cartItem) {
                return response()->json(['message' => 'Item not found in database'], 404);
            }

            $cartItem->update(['quantity' => $quantity]);
            return response()->json(['message' => 'Quantity updated (DB)']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['message' => 'Quantity updated (session)']);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }

    public function showCart()
    {
        $cart = auth()->check()
            ? CartItem::where('user_id', auth()->id())
                ->get()
                ->map(fn($item) => [
                    'id' => $item->product_id,
                    'type' => $item->type,
                    'name' => $item->name,
                    'price' => $item->price,
                    'image' => $item->image,
                    'quantity' => $item->quantity,
                ])
                ->keyBy(fn($item) => $item['type'] . '_' . $item['id'])
                ->toArray()
            : session('cart', []);

        return view('navigation.cart', compact('cart'));
    }

    public function removeFromCart(Request $request)
    {
        $key = $request->input('key');

        if (auth()->check()) {
            [$type, $id] = explode('_', $key);
            CartItem::where('user_id', auth()->id())
                ->where('type', $type)
                ->where('product_id', $id)
                ->delete();

            return response()->json(['message' => 'Removed from cart (DB)']);
        }

        $cart = session()->get('cart', []);
        unset($cart[$key]);
        session()->put('cart', $cart);

        return response()->json(['message' => 'Removed from cart (session)']);
    }
}
