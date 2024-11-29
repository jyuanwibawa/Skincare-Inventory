@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold">Product List</h1>
    <div class="mt-6">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
        <form method="GET" action="{{ route('products.index') }}" class="my-4">
            <input type="text" name="search" placeholder="Search Products" class="border p-2 rounded">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
        </form>
        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th>Name</th>
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
                            <a href="{{ route('products.edit', $product) }}" class="mr-2 text-blue-600">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }} <!-- Pagination -->
    </div>
@endsection
