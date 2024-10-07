<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller; // Ensure this is included
use Cart;

class UserCartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);

        if ($product) {
            // Check if the item already exists in the cart
            $existingCartItem = Cart::get($productId);

            if ($existingCartItem) {
                // If the item already exists, update the quantity
                Cart::update($productId, [
                    'quantity' => $existingCartItem->quantity + 1
                ]);
            } else {
                // Add the product to the cart
                Cart::add([
                    'id' => $productId,
                    'name' => $product->product_name,
                    'quantity' => 1,
                    'price' => $product->product_price,
                    'attributes' => [
                        'image' => $product->product_image
                    ]
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found!'
        ], 404);
    }


    public function cart_view_user()
    {
        // Get all items in the cart
        $cartItems = Cart::getContent();
        // Calculate the total price of the cart
        $totalPrice = Cart::getTotal();

        // Pass the cart items and total price to the view
        return view('users.add_to_card', compact('cartItems', 'totalPrice'));
    }

}
