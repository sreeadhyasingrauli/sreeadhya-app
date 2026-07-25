<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        
        $products = Product::paginate(10); 
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        
        Product::create($request->validated());
        return redirect()->route('products.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : View
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        //
        $product->update($request->validated());

        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : RedirectResponse
    {
        //
        $product->delete();

        return redirect()->back()
                ->withSuccess('Product is deleted successfully.');
    }
    public function downloadPdf()
    {
        // 1. Fetch stock data from database
        $products = Product::all();
        $allCompanies = Company::all();
        
       // Calculate total valuation of entire inventory
        $totalValuation = $products->sum(function ($product) {
            return $product->current_stock * $product->price;
        });
        // 2. Map metadata
        $data = [
            'title' => 'Current Stock Inventory Report',
            'date' => now()->format('Y-m-d H:i:s'),
            'products' => $products
        ];
        
        // 3. Load the blade view and share data
        // 3. Bind variables to your blade template view
        $pdf = Pdf::loadView('reports.stock_list', compact('products', 'allCompanies','totalValuation'))
        
                  ->setPaper('a4', 'portrait'); // Set page layout
        
        // 4. Return pdf stream (view in browser) or download()
       // Stream the file directly to browser for download
        return $pdf->download('stock_report_' . now()->format('Y-m-d') . '.pdf');
    }
}
