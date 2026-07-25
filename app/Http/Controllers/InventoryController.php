<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //
    // List all products along with their calculated current stock
    public function index()
    {
        $products = Product::with('transactions')->get();
        $products = Product::paginate(5); 
        return view('inventory.index', compact('products'));
    }
    // Create a new product and log its starting stock allocation
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
             'part_number' => 'required|string|unique:products,product_id',
             'alt_part_number' => 'required|string|max:25',
             'part_description' => 'required|string|max:255',
              'make' => 'required|string|max:25', 
              'uom' => 'required|string|max:25',         
             'price' => 'required|numeric|min:0',
             'hsn_code' => 'required|integer|min:0',
             'gst_rate' => 'required|integer|min:0',
            'current_stock' => 'required|integer|min:0',
             
        ]);

        $product = Product::create([
            'part_number' => $validated['part_number'],
            'alt_part_number' => $validated['alt_part_number'],
            'part_description' => $validated['part_description'],
            'make' => $validated['make'],
            'uom' => $validated['uom'], 
            'price' => $validated['price'],
            'hsn_code' => $validated['hsn_code'], 
            'gst_rate' => $validated['gst_rate'],
            'current_stock' => $validated['current_stock'],
             
        ]);

        // Record the initial stock allocation as an "in" entry
        if ($validated['current_stock'] > 0) {
            $product->transactions()->create([
                'type' => 'in',
                'quantity' => $validated['current_stock'],
                'reference' => 'Initial Stock Setup',
            ]);
        }

        return redirect()->back()->with('success', 'Product and stock created successfully!');
    }
     // Adjust existing stock levels manually (Stock In / Stock Out)
    public function adjustStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'reference' => 'nullable|string|max:255',
        ]);

        // Validation safety check: Prevent stock dropping below 0
        if ($validated['type'] === 'out' && $product->current_stock < $validated['quantity']) {
            return redirect()->back()->withErrors(['quantity' => 'Insufficient stock balance available.']);
        }

        $product->transactions()->create($validated);

        return redirect()->back()->with('success', 'Stock updated successfully!');
    }
    // Record Incoming Inventory (Suppliers, Restocking)
    public function stockIn(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'reference' => 'nullable|string'
        ]);

        $product = Product::findOrFail($id);

        DB::transaction(function () use ($product, $request) {
            $product->transactions()->create([
                'type' => 'in',
                'quantity' => $request->quantity,
                'reference' => $request->reference ?? 'Manual Restock'
            ]);
        });

        return response()->json(['message' => 'Stock updated successfully. New balance: ' . $product->current_stock]);
    }
    // Record Outgoing Inventory (Sales, Damage, Expirations)
    public function stockOut(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'reference' => 'nullable|string'
        ]);

        $product = Product::findOrFail($id);

        // Fail-safe logic: Prevent selling items you don't possess
        if ($product->current_stock < $request->quantity) {
            return response()->json(['error' => 'Insufficient stock available!'], 400);
        }

        DB::transaction(function () use ($product, $request) {
            $product->transactions()->create([
                'type' => 'out',
                'quantity' => $request->quantity,
                'reference' => $request->reference ?? 'Sale'
            ]);
        });

        return response()->json(['message' => 'Inventory reduced successfully.']);
    }
}
