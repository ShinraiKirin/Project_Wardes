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

    /**
     * Update the quantity of an item in the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Session::get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);

            $subtotal = $cart[$id]['price'] * $cart[$id]['quantity'];
            $total = $this->calculateTotal($cart);

            return response()->json([
                'message' => 'Cart updated successfully',
                'cartCount' => count($cart),
                'subtotal' => 'Rp' . number_format($subtotal, 0, ',', '.'),
                'total' => 'Rp' . number_format($total, 0, ',', '.'),
            ]);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }

    /**
     * Remove an item from the shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id)
    {
        $cart = Session::get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);

            $total = $this->calculateTotal($cart);

            return response()->json([
                'message' => 'Item removed successfully',
                'cartCount' => count($cart),
                'total' => 'Rp' . number_format($total, 0, ',', '.'),
            ]);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }

    /**
     * Calculate the total price of the cart.
     *
     * @param  array  $cart
     * @return float
     */
    private function calculateTotal(array $cart): float
    {
        $total = 0;
        foreach ($cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }
        return $total;
    }
}
