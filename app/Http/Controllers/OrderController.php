<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
 

class OrderController extends Controller
{
    //
    public function index() : View
    {
        //
        $order = Order::latest()->paginate(5);
        return view('orders.index', compact('order'));
        
    }
     public function create() : View
    {
        //
        $items = OrderItem::all();
         $allCompanies = Company::all();
        $allCustomers = Customer::all();
         $allProducts = Product::all();
        return view('orders.create', compact( 'allCustomers','allCompanies','items','allProducts'));
        
    }
    public function store(Request $request) :  RedirectResponse
    {
        // 1. Validate request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'order_number' => 'required|string',
            'order_date' => 'required|date',
            'valid_until' => 'required|date',
            'payment_terms' => 'required|string',
            'gst_terms' => 'required|string',
            'delivery_terms' => 'required|string',
            'pf_terms' => 'required|string',
            'pricebasis_terms' => 'required|string',
            'guarantee_terms' => 'required|string',
            'ld_terms' => 'required|string',
            'other_terms' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,product_id',
            'items.*.part_number' => 'required|string',
            'items.*.order_quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',

            
        ]);
        // 2. Calculate Totals
        $subtotal = collect($validated['items'])->sum(function ($item) {
            return $item['order_quantity'] * $item['unit_price'];
        });
        $gst_amount = $subtotal * 0.18; // Example 18% tax
        $total = $subtotal + $gst_amount;
        
        // 3. Save Order to Database
        $order = Order::create([
            'customer_id' => $validated['customer_id'],
            'order_number' => $validated['order_number'],
            'order_date' => $validated['order_date'],
            'valid_until' => $validated['valid_until'],
            'payment_terms' => $validated['payment_terms'],
            'gst_terms' => $validated['gst_terms'],
            'delivery_terms' => $validated['delivery_terms'],
            'pf_terms' => $validated['pf_terms'],
            'pricebasis_terms' => $validated['pricebasis_terms'],
            'guarantee_terms' => $validated['guarantee_terms'],
            'ld_terms' => $validated['ld_terms'],
            'other_terms' => $validated['other_terms'],
            'sub_total' => $subtotal,
            'gst_amount' => $gst_amount,
            'total_value' => $total,
        ]);
        
       // 2. Create Order Items
            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->order_id,
                    'product_id' => $item['product_id'],
                    'order_quantity' => $item['order_quantity'],
                    'unit_price' => $item['unit_price'],
                    'part_number' => $item['part_number'],
                    'part_description' => '   ',
                    'uom' =>'  ',
                    'hsn_code' => 0,
                    'gst_rate' => 0.00,
                    'gst_amount' => 0.00,
                    'sub_total' => $item['order_quantity'] * $item['unit_price'],
                     
                    'parts_total' => 0.00,
                ]);
            }
        
            DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.product_id')
            ->update([
                'order_items.part_description' => DB::raw('products.part_description'),
                'order_items.uom' => DB::raw('products.uom'),
                'order_items.hsn_code' => DB::raw('products.hsn_code'),
                'order_items.gst_rate' => DB::raw('products.gst_rate'),
                'order_items.updated_at' => now(), // Manually update timestamps when using DB builder
            ]);
            DB::table('order_items')
           
            ->update([
                
                'order_items.gst_amount' =>  DB::raw('order_items.sub_total * (order_items.gst_rate / 100)'),
                'order_items.parts_total' =>  DB::raw('order_items.sub_total + order_items.gst_amount'),
                'order_items.updated_at' => now(), // Manually update timestamps when using DB builder
            ]);

        
         // return response()->json(['message' => 'Offer created successfully']);
       return redirect()->route('orders.index')
                ->withSuccess('Order is created successfully.');
        
    }
    public function destroy(Order $order) : RedirectResponse
    {
        //
         $order->delete();

        return redirect()->back()
                ->withSuccess('Order is deleted successfully.');
        
    }
    public function generateOrderAcceptance($id)
    {
       $order = Order::where('id', $id)->first();
       $items = OrderItem::where('order_id', $id)->get();
        Order::where('id', $id)->update(['order_status' => 'Accepted']);
        $products = Product::all(); 
        $allCompanies = Company::all();
        $customerWithPO = DB::table('customers')
        ->join('orders', 'customers.customer_id', '=', 'orders.customer_id')
        ->where('id', $id)
         ->select('customers.*')
        ->get();
        // Load the view and pass the order data
        $pdf = Pdf::loadView('orders.order-acceptance', compact('order','items','customerWithPO','allCompanies','products'));

        // Option 1: Download the PDF directly to user's computer
        return $pdf->download('order-acceptance-' . $order->id . '.pdf');

        // Option 2: Stream the PDF in the browser
        // return $pdf->stream('order-acceptance-' . $order->id . '.pdf');
    }
}
        

