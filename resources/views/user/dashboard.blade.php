@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-4">User Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}! Here are your latest activities:</p>

        <!-- Daftar produk yang dibeli -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">My Purchases</h2>
            <table class="min-w-full mt-4">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop melalui riwayat pembelian produk -->
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->product->name }}</td>
                            <td>Rp {{ number_format($purchase->product->price, 0, ',', '.') }}</td>
                            <td>{{ $purchase->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
