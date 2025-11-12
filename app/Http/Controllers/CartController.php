<?php

namespace App\Http\Controllers;

// use App\Models\Item; // No longer needed for dummy data
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display the shopping cart contents.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cartItems = Session::get('cart', []);
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add an item to the shopping cart using a dummy ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $id)
    {
        // Define dummy items based on the ID from the view
        $dummyItems = [
            1 => ['name' => 'Nasi Goreng Spesial', 'price' => 25000, 'image' => 'nasi-goreng.jpg'],
            2 => ['name' => 'Soto Ayam', 'price' => 18000, 'image' => 'soto-ayam.jpg'],
            3 => ['name' => 'Es Teh Manis', 'price' => 5000, 'image' => 'es-teh.jpg'],
            4 => ['name' => 'Ayam Bakar Bumbu Rujak', 'price' => 35000, 'image' => 'ayam-bakar.jpg'],
            5 => ['name' => 'Gado-Gado', 'price' => 15000, 'image' => 'gado-gado.jpg'],
            6 => ['name' => 'Jus Jeruk Segar', 'price' => 8000, 'image' => 'jus-jeruk.jpg'],
        ];

        // Find the selected dummy item
        $item = $dummyItems[$id] ?? null;

        // If item doesn't exist, handle error (optional)
        if (!$item) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Item not found'], 404);
            }
            return redirect()->back()->with('error', 'Item not found!');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $item['name'],
                "quantity" => 1,
                "price" => $item['price'],
                "image" => $item['image']
            ];
        }

        Session::put('cart', $cart);

        if ($request->ajax()) {
            return response()->json(['cartCount' => count($cart)]);
        }

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    // You might want to add update and remove methods later
    // public function update(Request $request, $id) { ... }
    // public function remove($id) { ... }
}
