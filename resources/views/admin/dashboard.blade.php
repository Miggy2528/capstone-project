@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-3"><div class="card p-3 shadow-sm">Sales Today: ₱{{ number_format($todaySales, 2) }}</div></div>
        <div class="col-md-3"><div class="card p-3 shadow-sm">Total Orders: {{ $orderCount }}</div></div>
        <div class="col-md-3"><div class="card p-3 shadow-sm">Customers: {{ $customerCount }}</div></div>
        <div class="col-md-3"><div class="card p-3 shadow-sm">Low Stock: {{ $lowStock->count() }}</div></div>
    </div>

    <h4>Recent Orders</h4>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Customer</th><th>Total</th><th>Status</th><th>Date</th></tr></thead>
        <tbody>
            @foreach($recentOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Guest' }}</td>
                <td>₱{{ number_format($order->total, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-5">Low Stock Products</h4>
    <ul>
        @forelse($lowStock as $product)
            <li>{{ $product->name }} — Stock: {{ $product->stock }}</li>
        @empty
            <li>All stocks are sufficient.</li>
        @endforelse
    </ul>
</div>
@endsection
