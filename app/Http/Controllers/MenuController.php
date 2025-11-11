<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Asumsi Anda memiliki model Item

class MenuController extends Controller
{
    //
    /**
     * Display a listing of the menu items.
     */
    public function index()
    { // Mengubah 'customer.menu' menjadi 'menu.index'
        // Mengambil semua item beserta kategori terkait
        $items = Item::with('category')->latest()->get();

        // Mengirim data items ke view
        return view('menu.index', compact('items'));
    }
}
