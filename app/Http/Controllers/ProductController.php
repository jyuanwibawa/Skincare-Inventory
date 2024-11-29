<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Order; // Pastikan Order sudah terimport
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method untuk menampilkan produk dengan pencarian dan paginasi
    public function index(Request $request)
{
    // Ambil data brand dari database
    $brands = Brand::all();

    // Ambil data produk berdasarkan pencarian (jika ada)
    $search = $request->query('search');

    $products = Product::with('brand')
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10);

    // Menghitung total produk, merek, dan order
    $totalProducts = Product::count();
    $totalBrands = Brand::count();
    $totalOrders = Order::count(); // Pastikan model Order sudah ada dan terhubung dengan database

    // Mengirim data ke view
    return view('admin.dashboard', compact('products', 'totalProducts', 'totalBrands', 'totalOrders', 'brands'));
}

    // Method untuk menampilkan form edit produk
    public function edit($id)
    {
        // Mengambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Mengambil semua merek untuk ditampilkan di form edit
        $brands = Brand::all();

        // Menampilkan form edit produk
        return view('admin.products.edit', compact('product', 'brands'));
    }

    // Method untuk menghapus produk
    public function destroy($id)
    {
        // Mengambil produk berdasarkan ID dan menghapusnya
        $product = Product::findOrFail($id);
        $product->delete();

        // Mengarahkan kembali ke halaman produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    // Method untuk menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Menyimpan produk baru ke database
        Product::create($validated);

        // Mengarahkan kembali ke halaman produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }
}
