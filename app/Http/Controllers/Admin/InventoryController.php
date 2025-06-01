<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    // List all inventory items
    public function index()
    {
        $items = Inventory::all();
        return view('admin.inventory.index', compact('items'));
    }

    // Show form to create a new item
    public function create()
    {
        return view('admin.inventory.create');
    }

    // Store new item in DB
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Inventory::create($request->all());

        return redirect()->route('admin.inventory.index')->with('success', 'Item added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('admin.inventory.edit', compact('item'));
    }

    // Update item in DB
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $item = Inventory::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('admin.inventory.index')->with('success', 'Item updated successfully.');
    }

    // Delete item
    public function destroy($id)
    {
        Inventory::destroy($id);
        return redirect()->route('admin.inventory.index')->with('success', 'Item deleted successfully.');
    }
}
