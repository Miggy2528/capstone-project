@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Edit Inventory Item</h1>

    <form action="{{ route('admin.inventory.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Name:</label>
            <input type="text" name="name" class="w-full border p-2" value="{{ $inventory->name }}" required>
        </div>
        <div class="mb-4">
            <label>Quantity:</label>
            <input type="number" name="quantity" class="w-full border p-2" value="{{ $inventory->quantity }}" required>
        </div>
        <div class="mb-4">
            <label>Price (₱):</label>
            <input type="number" name="price" step="0.01" class="w-full border p-2" value="{{ $inventory->price }}" required>
        </div>
        <div class="mb-4">
            <label>Description (optional):</label>
            <textarea name="description" class="w-full border p-2">{{ $inventory->description }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.inventory.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
