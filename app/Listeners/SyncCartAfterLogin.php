<?php

namespace App\Listeners;

use IlluminateAuthEventsLogin;
use Illuminate\Auth\Events\Login;
use App\Models\CartItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncCartAfterLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $sessionCart = session()->get('cart', []);

        foreach ($sessionCart as $item) {
            $existing = CartItem::where('user_id', $user->id)
                ->where('type', $item['type'])
                ->where('product_id', $item['id'])
                ->first();

            if ($existing) {
                $existing->quantity += $item['quantity'];
                $existing->save();
            } else {
                CartItem::create([
                    'user_id'    => $user->id,
                    'type'       => $item['type'],
                    'product_id' => $item['id'],
                    'name'       => $item['name'],
                    'price'      => $item['price'],
                    'image'      => $item['image'],
                    'quantity'   => $item['quantity'],
                ]);
            }
        }

        session()->forget('cart');
    }
}
