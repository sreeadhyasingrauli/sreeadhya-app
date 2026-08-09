<?php

namespace App\Http\Controllers;

 
use App\Models\ProformaInvoice;
use App\Models\ProformaInvoiceItem;

use Illuminate\Http\Request;
use App\Utils\RupeeConverter;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Models\Order;
use App\Models\OrderItem;

use App\Models\Customer;
use App\Models\Company;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProformaInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $proformaInvoices = ProformaInvoice::paginate(10);
        return view('proforma-invoices.index', compact('proformaInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $items = ProformaInvoiceItem::all();
        $allCustomers = Customer::all();
         $allCompanies = Company::all();
         $allProducts = Product::all();
         $allPOs  = Order::all();
         $allPOItems  = OrderItem::all();
        return view('proforma-invoices.create', compact( 'allCustomers','allPOItems','allCompanies','items','allProducts','allPOs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Rigorous Data Validation
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'order_id' => 'required|exists:orders,id',
            
            'invoice_date' => 'required|date',
            'items' => 'required|array|min:1',
            
            'items.*.part_number' => 'required|string',
            'items.*.inv_quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        // 2. Encapsulated DB Transaction 
        $proformaInvoices = DB::transaction(function () use ($validated) {
            
            // Create the primary Invoice Header record
            $proformaInvoice = ProformaInvoice::create([
                'customer_id' => $validated['customer_id'],
                'order_id' => $validated['order_id'], // Unique Number Variant
                'invoice_date' => $validated['invoice_date'],
                'basic_amount' => 0.00,
                'gst_amount' => 0.00,
                'invoice_amount' => 0.00, // Placeholder to update post-calculation
                'received_amount' => 0.00,
                'balance_amount' => 0.00,
                'payment_status' => 'unpaid',
                'invoice_status' => 'active',
            ]);

            $totalAmount = 0;
            $gstValue = 0;
             $totalValue = 0;
             $totalReceived = 0;
              $totalBalance = 0;

            // Process and iterate individual purchase rows
            foreach ($validated['items'] as $item) {
                $subtotal = $item['inv_quantity'] * $item['unit_price'];
                $gst_amount =  ($subtotal * 18/100 ); 
                $total_amount =  ($subtotal + $gst_amount);
                $totalAmount += $subtotal;
                $gstValue   += $gst_amount; 
                $totalValue = ($totalAmount + $gstValue) ;
                 $totalBalance = $totalValue;

                $proformaInvoice->items()->create([
                    'part_number' => $item['part_number'],
                    'part_description' => ' ',
                    'inv_quantity' => $item['inv_quantity'],
                    'unit_price' => $item['unit_price'],
                    'uom' => ' ',
                    'hsn_code' => 0,
                    'sub_total' => $subtotal,
                    'gst_rate' => 0.00,
                    'gst_amount' => 0.00,
                     
                ]);
                 DB::table('proforma_invoice_items')
                ->join('order_items', 'proforma_invoice_items.part_number', '=', 'order_items.part_number')
                ->update([
                'proforma_invoice_items.part_description' => DB::raw('order_items.part_description'),
                'proforma_invoice_items.uom' => DB::raw('order_items.uom'),
                'proforma_invoice_items.updated_at' => now(), // Manually update timestamps when using DB builder
                ]);
                DB::table('proforma_invoice_items')
                ->join('products', 'proforma_invoice_items.part_number', '=', 'products.part_number')
                ->update([
                'proforma_invoice_items.hsn_code' => DB::raw('products.hsn_code'),
                'proforma_invoice_items.gst_rate' => DB::raw('products.gst_rate'),
                'proforma_invoice_items.gst_amount' => DB::raw('products.gst_rate * proforma_invoice_items.sub_total / 100'),
                'proforma_invoice_items.updated_at' => now(), // Manually update timestamps when using DB builder
                ]);

            }

            // Sync structural grand total balance calculation back to base PO
            $proformaInvoice->update(['basic_amount' => $rounded = round($totalAmount, 2)]);
            $proformaInvoice->update(['gst_amount' => $rounded = round($gstValue, 2)]);
            $proformaInvoice->update(['invoice_amount' => $rounded = round($totalValue, 2)]);
            $proformaInvoice->update(['balance_amount' => $rounded = round( $totalBalance, 2)]);
            $proformaInvoice->update(['received_amount' => $rounded = round($totalReceived, 2)]);

            return $proformaInvoice;
        });

         return redirect()->route('proforma-invoices.index')
                ->withSuccess('Proforma Invoice is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proformaInvoices = ProformaInvoice::with('items')->findOrFail($id);
        return view('proforma-invoices.show', compact('proformaInvoices'));
        return redirect()->route('proforma-invoices.index')
                ->withSuccess('Payment against this Proforma Invoice is created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the record or throw a 404 error if it does not exist
        $invoice = ProformaInvoice::findOrFail($id);

        // Delete the record
        $invoice->delete();

        return redirect()->route('proforma-invoices.index')
                         ->with('success', 'Proforma invoice deleted successfully.');
    }
    public function download($id)
    {
        // 1. Fetch the specific invoice or fail if it doesn't exist
         $proformaInvoices = ProformaInvoice::with('items')->findOrFail($id);
         $items = ProformaInvoiceItem::all();
        $allCompanies = Company::all();
        $products = Product::all();
        
        
        $customerWithInvoice = DB::table('customers')
        ->join('proforma_invoices', 'customers.customer_id', '=', 'proforma_invoices.customer_id')
         ->where('proforma_invoices.id', $id)
        ->select('customers.*', )
        ->get();
        $poWithInvoice = DB::table('orders')
        ->join('proforma_invoices', 'orders.id', '=', 'proforma_invoices.order_id')
         ->where('proforma_invoices.id', $id)
        ->select('orders.*', )
        ->get();
        
        // 2. Pass the data to your dedicated Blade layout
        $grandTotal = $proformaInvoices->invoice_amount; // Example amount
        // Convert to words
        $amountInWords = RupeeConverter::convert($grandTotal);
        $data = [
            'amount' => $grandTotal,
            'amount_in_words' => $amountInWords
            ];
        // Load the view and bind data matrix
        // $pdf = Pdf::loadView('pdf.invoice', compact('invoice'));
        $pdf = Pdf::loadView('proforma-invoices.pdf', compact('proformaInvoices','poWithInvoice','products','customerWithInvoice','allCompanies','items','data','amountInWords'));
        // 3. Set custom paper size if needed (Optional)
        $pdf->setPaper('a4', 'portrait');

        // 4. Force the file to download with a unique file name
       return $pdf->download('ProformaInvoice-' . $proformaInvoices->customer_id . '.pdf');
              
        
    }
}
