@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Inventory Item</h1>

    <form action="{{ route('admin.inventory.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Name:</label>
            <input type="text" name="name" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Quantity:</label>
            <input type="number" name="quantity" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Price (₱):</label>
            <input type="number" name="price" step="0.01" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Description (optional):</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('admin.inventory.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
