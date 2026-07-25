<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\PurchaseOrderService;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;



class PurchaseOrderController extends Controller
{
    //
    // 
    public function index() : View
    {
        //
        $purchaseorder = PurchaseOrder::latest()->paginate(5);
        return view('purchase-orders.index', compact('purchaseorder'));
        
    }
    public function create() : View
    {
        //
        $items = PurchaseOrderItem::all();
        $allVendors = Vendor::all();
         $allProducts = Product::all();
         $allCompanies = Company::all();
        return view('purchase-orders.create', compact( 'allVendors','allCompanies','items','allProducts'));
        
    }
     // Inject the custom Service Class via dependency injection
    

    public function store(Request $request)
    {
        // 1. Rigorous Data Validation
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,vendor_id',
            'po_number' => 'required|string|max:25',
            'po_date' => 'required|date',
            'gst_terms' => 'required|string|max:50',
            'delivery_terms' => 'required|string|max:50',
            'pf_terms' => 'required|numeric|min:0',
            'transport' => 'required|string|max:50',
            'items' => 'required|array|min:1',
            'items.*.part_number' => 'required|string',
             'items.*.part_description' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.uom' => 'required|string',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        // 2. Encapsulated DB Transaction 
            $purchaseorder = DB::transaction(function () use ($validated) {
            
            // Create the primary Purchase Order Header record
           $purchaseorder = PurchaseOrder::create([
                'vendor_id' => $validated['vendor_id'],
                'po_number' => $validated['po_number'], // Unique Number Variant
                'po_date' => $validated['po_date'],
                'gst_terms' => $validated['gst_terms'],
                'delivery_terms' => $validated['delivery_terms'],
               'pf_terms' => $validated['pf_terms'],
               'transport' => $validated['transport'],
                'basic_value' => 0.00,
                'gst_value' => 0.00,
                'pf_value' => 0.00,
                'total_value' => 0.00, // Placeholder to update post-calculation
                'status' => 'draft',
            ]);

            $totalAmount = 0;
            $gstValue = 0;
            $pfValue = 0;
             $totalValue = 0;

            // Process and iterate individual purchase rows
            foreach ($validated['items'] as $item) {
                $subtotal = $item['quantity'] * $item['unit_price'];
                $gst_amount =  ($subtotal * 18/100 ); 
                $pf_amount =  ($subtotal * $validated['pf_terms']/100 ); 
                $total_amount =  ($subtotal + $gst_amount + $pf_amount);
                $totalAmount += $subtotal;
                $gstValue   += $gst_amount; 
                $pfValue    += $pf_amount; 
                $totalValue = ($totalAmount + $gstValue + $pfValue) ;
                
                $purchaseorder->items()->create([
                    'part_number' => $item['part_number'],
                    'part_description' => $item['part_description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'uom' => $item['uom'],
                    'subtotal' => $subtotal,
                    'gst_amount' => $gst_amount,
                    'pf_amount' => $pf_amount,
                    'total_amount' => $total_amount
                ]);
            }

            // Sync structural grand total balance calculation back to base PO
            
            $purchaseorder->update(['basic_value' => $rounded = round($totalAmount, 2)]);
            $purchaseorder->update(['gst_value' => $rounded = round($gstValue, 2)]);
            $purchaseorder->update(['pf_value' => $rounded = round($pfValue, 2)]);
            $purchaseorder->update(['total_value' => $rounded = round($totalValue, 2)]);
            

            return $purchaseorder;
        });

         return redirect()->route('purchase-orders.index')
                ->withSuccess('Purchase Order is created successfully.');
    }
    public function generateOrderAcceptance($id)
    {
        $purchaseorder = PurchaseOrder::with('items')->findOrFail($id);
        $products = Product::all(); 
        $allCompanies = Company::all();
        $vendorWithPO = DB::table('vendors')
        ->join('purchase_orders', 'vendors.vendor_id', '=', 'purchase_orders.vendor_id')
         ->where('purchase_orders.id', $id)
        ->select('vendors.*', )
        ->get();
        // Load the view and pass the order data
        $pdf = Pdf::loadView('pdf.purchase-order', compact('purchaseorder','vendorWithPO','allCompanies','products'));

        // Option 1: Download the PDF directly to user's computer
        return $pdf->download('Purchase-Order-' . $purchaseorder->id . '.pdf');

        // Option 2: Stream the PDF in the browser
        // return $pdf->stream('order-acceptance-' . $purchaseorder->id . '.pdf');
    }

    public function show(Request $request) : View
    {
        //
         
    }
    public function edit(Request $request) : View
    {
        //
        
    }
    public function update(Request $request) : RedirectResponse
    {
        //
        
    }
    public function destroy(PurchaseOrder $purchaseorder) : RedirectResponse
    {
        //
        
       PurchaseOrder::where('status', 'draft')->delete();
        

        return redirect()->back()
                ->withSuccess('Purchase Order is deleted successfully.');
    }

}




