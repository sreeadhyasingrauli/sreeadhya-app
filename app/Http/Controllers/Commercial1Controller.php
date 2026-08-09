<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Models\CommercialOffer;

use App\Models\Customer;
use App\Models\Company;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
 
 

use Illuminate\Http\Request;


class CommercialController extends Controller
{
    //
    public function index() : View
    {
        //
        $offer = CommercialOffer::latest()->paginate(5);
        return view('commercialoffer.index', compact('offer'));
        
    }
    public function create() : View
    {
        //
        
        $allCompanies = Company::all();
        $allCustomers = Customer::all();
        
        return view('commercialoffer.create', compact( 'allCustomers','allCompanies'));
        
    }
    public function store(Request $request) :  RedirectResponse
    {
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
        $offer = CommercialOffer::create([
            'customer_id' => $validated['customer_id'],
            'offer_number' => $validated['offer_number'],
            'offer_date' => $validated['offer_date'],
            'enquiry_number' => $validated['ref_number'],
            'enquiry_date' => $validated['ref_date'],
            'validity' => $validated['validity'],
            'payment_terms' => $validated['payment_terms'],
            'gst_terms' => $validated['gst_terms'],
            'delivery_terms' => $validated['delivery_terms'],
            'discount' => $validated['pf_terms'],
            'pricebasis_terms' => $validated['pricebasis_terms'],
            'guarantee_terms' => $validated['guarantee_terms'],
            
            'other_terms' => $validated['other_terms'],
            
        ]);
        
       
        
       
        

       // return response()->json(['message' => 'Offer created successfully']);
       return redirect()->route('commercialoffer.index')
                ->withSuccess('Commercial Offer is created successfully.');
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
    public function destroy(Offer $offer) : RedirectResponse
    {
        //
         $commercialoffer->delete();

        return redirect()->back()
                ->withSuccess('Offer is deleted successfully.');
        
    }

    public function download($id)
    {
        // Fetch the specific offer from the database
        $offer = Offer::with('items')->findOrFail($id);
        $offers = Offer::with('product')->get();
        $allCompanies = Company::all();
        

        $customerWithOffers = DB::table('customers')
        ->join('offers', 'customers.customer_id', '=', 'offers.customer_id')
         ->where('offers.offer_id', $id)
        ->select('customers.*', 'offers.offer_number as offer_number', 'offers.offer_date')
        ->get();
         // Load the view and pass the data to it
        $pdf = Pdf::loadView('pdf.offer', compact('offer','customerWithOffers','allCompanies'));

        // Return the PDF to the browser (stream) or download it
        return $pdf->download('customer_offer_'.$id.'.pdf');

        // Optional: Check if the user is authorized to download this offer
        // Gate::authorize('view', $offer);

        // Define the file path (e.g., assuming it is stored in storage/app/offers)
        //$filePath = 'offers/' . $offer->file_name;

        // Verify the file actually exists on the disk
        //if (!Storage::exists($filePath)) {
      //      abort(404, 'File not found.');
       // }

        // Return the download stream, renaming the downloaded file on the fly
       // return Storage::download($filePath, 'special-offer-' . $offer->id . '.pdf', [
        //    'Content-Type' => 'application/pdf',
        //]);
         
         
    }
    public function generateOfferPdf($id)
    {
        // Retrieve the offer data from the database
        $offer = Offer::findOrFail($id);
        $customer = Customer::with('offers')->findOrFail($id);
         $allCompanies = Company::all();
        // Load the view and pass the data to it
        $pdf = Pdf::loadView('offer', compact('offer','customer','allCompanies'));

        // Return the PDF to the browser (stream) or download it
        return $pdf->download('customer_offer_'.$id.'.pdf');
    }
    public function generateOffer($id)
    {
        // Retrieve the offer data from the database
        $offer = Offer::findOrFail($id);
        $customer = Customer::with('offers')->findOrFail($id);
        $allCompanies = Company::all();
        // Load the view and pass the data to it
        $pdf = Pdf::loadView('offer', compact('offer','customer','allCompanies'));

        // Return the PDF to the browser (stream) or download it
        return $pdf->download('customer_offer_'.$id.'.pdf');
    }
}
