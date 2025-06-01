@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Inventory List</h1>

    <a href="{{ route('admin.inventory.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Add Item</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-3">{{ session('success') }}</div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Quantity</th>
                <th class="border p-2">Price</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td class="border p-2">{{ $item->id }}</td>
                <td class="border p-2">{{ $item->name }}</td>
                <td class="border p-2">{{ $item->quantity }}</td>
                <td class="border p-2">₱{{ $item->price }}</td>
                <td class="border p-2">
                    <a href="{{ route('admin.inventory.edit', $item->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.inventory.destroy', $item->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
