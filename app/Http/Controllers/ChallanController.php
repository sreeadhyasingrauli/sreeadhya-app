<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\ChallanItem;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\DB;

class ChallanController extends Controller
{
    //
    public function index() : View
    {
        //
        $challans = Challan::latest()->paginate(5);
        return view('challans.index', compact('challans'));
         
    }
     public function create() : View
    {
        //
         $items = ChallanItem::all();
        $allCustomers = Customer::all();
         $allCompanies = Company::all();
         $allProducts = Product::all();
         $allOrders  = Order::all();
         $allOrderItems  = OrderItem::all();
        return view('challans.create', compact( 'allCustomers','allOrderItems','allCompanies','items','allProducts','allOrders'));
        
    }
    public function store(Request $request) : RedirectResponse
    {
         // 1. Validate request inputs
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            
            'challan_number' => 'required|string',
            'challan_date' => 'required|date',
            'order_number' => 'required|string',
            'order_date' => 'required|date',
            'vehicle_number' => 'required|string',
            'items' => 'required|array',
            'items.*.part_number' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        // 2. Create the Challan
        $challan = Challan::create([
            'customer_id' => $request->customer_id,
            'challan_number' => $request->challan_number,
            'challan_date' => $request->challan_date,
            'order_number' => $request->order_number,
            'order_date' => $request->order_date,
            'vehicle_number' => $request->vehicle_number,
             
        ]);

        // 3. Create the Challan Items
        foreach ($request->items as $item) {
            ChallanItem::create([
                'challan_id' => $challan->id,
                'part_number' => $item['part_number'],
                'part_description' =>  ' ',
                'quantity' => $item['quantity'],
                'uom' =>  ' ',
                'price' => $item['price'],
            ]);
             DB::table('challan_items')
                ->join('order_items', 'challan_items.part_number', '=', 'order_items.part_number')
                ->update([
                'challan_items.part_description' => DB::raw('order_items.part_description'),
                'challan_items.uom' => DB::raw('order_items.uom'),
                'challan_items.updated_at' => now(), // Manually update timestamps when using DB builder
                ]);
        }

        // return response()->json(['message' => 'Offer created successfully']);
       return redirect()->route('challans.index')
                ->withSuccess('Challan is created successfully.');
    
    }
    public function destroy(Challan $challan) : RedirectResponse
    {
        //
         $challan->delete();

        return redirect()->back()
                ->withSuccess('Challan is deleted successfully.');
        
    }
    
    public function download($id)
    {
        // 1. Fetch the specific invoice or fail if it doesn't exist
         $challan = Challan::with('items')->findOrFail($id);
         $items = ChallanItem::all();
        $allCompanies = Company::all();
        $products = Product::all();
        
        
        $customerWithChallan = DB::table('customers')
        ->join('challans', 'customers.customer_id', '=', 'challans.customer_id')
         ->where('challans.id', $id)
        ->select('customers.*', )
        ->get();
       
        
        
        // Load the view and bind data matrix
        // $pdf = Pdf::loadView('pdf.invoice', compact('invoice'));
        $pdf = Pdf::loadView('challans.pdf', compact('challan','products','customerWithChallan','allCompanies','items',));
        // 3. Set custom paper size if needed (Optional)
        $pdf->setPaper('a4', 'portrait');

        // 4. Force the file to download with a unique file name
       return $pdf->download('challan-' . $challan->customer_id . '.pdf');
              
        
    }
}
