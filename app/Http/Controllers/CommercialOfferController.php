<?php

namespace App\Http\Controllers;

use App\Models\CommercialOffer;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommercialOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        
        $commercialoffers = CommercialOffer::latest()->paginate(10);
        return view('commercial-offers.index', compact('commercialoffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        //
        $allCompanies = Company::all();
        $allCustomers = Customer::all();
        
        return view('commercial-offers.create', compact( 'allCustomers','allCompanies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //
        // 1. Validate request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'offer_number' => 'required|string',
            'offer_date' => 'required|date',
            'enquiry_number' => 'required|string',
            'enquiry_date' => 'required|date',
            'validity' => 'required|string',
            'payment_terms' => 'required|string',
            'gst_terms' => 'required|string',
            'delivery_terms' => 'required|string',
            'discount' => 'required|string',
            'pricebasis_terms' => 'required|string',
            'guarantee_terms' => 'required|string',
            'other_terms' => 'required|string',
              ]);

              // 3. Save Offer to Database
            $commerialoffers = CommercialOffer::create([
            'customer_id' => $validated['customer_id'],
            'offer_number' => $validated['offer_number'],
            'offer_date' => $validated['offer_date'],
            'enquiry_number' => $validated['enquiry_number'],
            'enquiry_date' => $validated['enquiry_date'],
            'validity' => $validated['validity'],
            'payment_terms' => $validated['payment_terms'],
            'gst_terms' => $validated['gst_terms'],
            'delivery_terms' => $validated['delivery_terms'],
            'discount' => $validated['discount'],
            'pricebasis_terms' => $validated['pricebasis_terms'],
            'guarantee_terms' => $validated['guarantee_terms'],
            'other_terms' => $validated['other_terms'],
            
        ]);

        return redirect()->route('commercial-offers.index')
                         ->with('success', 'Commercial offer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommercialOffer $commercialOffer) : View
    {
        //
        return view('commercial--offers.show', compact('commercialOffer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommercialOffer $commercialOffer) : View
    {
        //
        return view('commercial-offers.edit', compact('commercialOffer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommercialOffer $commercialOffer) : RedirectResponse
    {
        //
         $validated = $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'offer_number' => 'required|string',
            'offer_date' => 'required|date',
            'enquiry_number' => 'required|string',
            'enquiry_date' => 'required|date',
            'validity' => 'required|string',
            'payment_terms' => 'required|string',
            'gst_terms' => 'required|string',
            'delivery_terms' => 'required|string',
            'discount' => 'required|string',
            'pricebasis_terms' => 'required|string',
            'guarantee_terms' => 'required|string',
            'other_terms' => 'required|string',
              ]);
            $commercialOffers->update($validated);

        return redirect()->route('commercial-offers.index')
                         ->with('success', 'Commercial offer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommercialOffer $commercialOffer) : RedirectResponse
    {
        //
        $commercialOffer->delete();

        return redirect()->route('commercial-offers.index')
                         ->with('success', 'Commercial offer deleted successfully.');
    }
    public function download($id)
    {
        // Fetch the specific offer from the database
        $offer = CommercialOffer::findOrFail($id);
         
        $allCompanies = Company::all();
        

        $customerWithOffers = DB::table('customers')
        ->join('commercial_offers', 'customers.customer_id', '=', 'commercial_offers.customer_id')
         ->where('commercial_offers.id', $id)
        ->select('customers.*', 'commercial_offers.offer_number as offer_number', 'commercial_offers.offer_date')
        ->get();
         // Load the view and pass the data to it
        $pdf = Pdf::loadView('pdf.commercialoffer', compact('offer','customerWithOffers','allCompanies'));

        // Return the PDF to the browser (stream) or download it
        return $pdf->download('commercial_offer_'.$id.'.pdf');

               
         
    }
}
