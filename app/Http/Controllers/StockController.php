<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\StockMutation;
use App\Services\StockService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class StockController extends Controller
{
    //
    public function index() : View
    {
       
         $stockTransactions = StockTransaction::latest()->paginate(5);
        return view('stock.index', compact('stockTransactions'));
        // Generates an optimized query carrying a 'mutations_sum_quantity' field
       // $products = Product::withSum('mutations', 'quantity')->get();
        //return view('stock.index', compact('products'));
    }
    public function create() : View
    {
        //
         $allProducts = Product::all();
        return view('stock.create', compact( 'allProducts'));
        
    }

    public function updateStock(Request $request, Product $product)
    {
        $validated = $request->validate([
            'type' => 'required|in:in,out,adjustment',
            'quantity' => 'required|integer|min:1',
            'reference' => 'nullable|string|max:255',
        ]);

        // Prevent inventory from dropping below zero during a sale
        if ($validated['type'] === 'out' && $product->stock_quantity < $validated['quantity']) {
            return response()->json(['error' => 'Insufficient stock remaining.'], 422);
        }

        $updatedProduct = $this->stockService->adjustStock(
            $product,
            $validated['type'],
            $validated['quantity'],
            $validated['reference']
        );

        // Low stock notification rule hook
        if ($updatedProduct->stock_quantity <= $updatedProduct->alert_threshold) {
            // Trigger customized notification emails or SMS here
        }

        return response()->json([
            'message' => 'Stock updated successfully.',
            'current_stock' => $updatedProduct->stock_quantity
        ]);
    }

    // Processes the submitted form data
    public function store(Request $request)
    {
        // 1. Validate the form payload
        $validated = $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'type' => 'required|in:in,out,adjustment',
            'quantity' => 'required|integer|min:0',
            'reference' => 'nullable|string|max:255',
        ]);

        // 2. Persist the database record
        StockTransaction::create($validated);
        
        // 3. Redirect back to list view with status flash
        return redirect()->route('stock.index')->with('success', 'Stock transaction added successfully!');
    }
    // Add stock (Inbound Inventory)
    public function addStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'reference' => 'nullable|string'
        ]);

        $product = Product::findOrFail($id);
        
        $product->mutations()->create([
            'quantity' => $request->quantity,
            'type' => 'in',
            'reference' => $request->reference
        ]);

         return redirect()->route('stock.index')->with('success', 'Stock transaction added successfully!');
    }
    // Deduct stock (Outbound Sales/Damage)
    public function removeStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:out,adjustment',
        ]);

        $product = Product::findOrFail($id);

        // Prevent negative stock
        if ($product->current_stock < $request->quantity) {
            return redirect()->route('stock.index')->with('success', 'Insufficient Stock Balance!');
        }

        $product->mutations()->create([
            'quantity' => -$request->quantity, // Convert to negative entry
            'type' => $request->type,
            'reference' => $request->reference
        ]);

        return redirect()->route('stock.index')->with('success', 'Stock transaction deducted successfully!');
    }
    // Restock processing (e.g. Supplier delivery)
    public function restock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($id);
        $product->addStock($request->quantity);

        return response()->json([
            'message' => 'Stock updated successfully.',
            'current_stock' => $product->current_stock
        ]);
    }
    // Purchase processing (e.g. Order checkout)
    public function checkout(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            // Use database transaction to avoid overlapping updates
            DB::transaction(function () use ($request, $id) {
                // Use lockForUpdate to pause other orders on this item until done
                $product = Product::lockForUpdate()->findOrFail($id);
                $product->removeStock($request->quantity);
            });

            return response()->json(['message' => 'Purchase successful.']);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
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
