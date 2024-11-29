@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-4">Admin Dashboard</h1>

        <!-- Statistik Dashboard -->
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl">Total Products</h2>
                <p>{{ $totalProducts }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl">Total Brands</h2>
                <p>{{ $totalBrands }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl">Total Orders</h2>
                <p>{{ $totalOrders }}</p>
            </div>
        </div>

        <!-- Menampilkan daftar Brand -->
        <div class="mt-6">
            <h2 class="text-xl">List of Brands</h2>
            <ul>
                @foreach ($brands as $brand)
                    <li>{{ $brand->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Daftar Produk -->
        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $products->links() }}
    </div>
@endsection
