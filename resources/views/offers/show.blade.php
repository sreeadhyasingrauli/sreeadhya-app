@extends('offers.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Offer Information
                </div>
                <div class="float-end">
                    <a href="{{ route('offers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <label for="customer_id" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer ID:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->customer_id  }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="offer_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Offer Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->offer_number }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="valid_until" class="col-md-4 col-form-label text-md-end text-start"><strong>Valid Until (Date):</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->valid_until }}
                        </div>
                    </div>
                    
                        
                    
                    
                    <div class="row">
                        <label for="subtotal" class="col-md-4 col-form-label text-md-end text-start"><strong>Sub Total:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->subtotal }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="gst_amount" class="col-md-4 col-form-label text-md-end text-start"><strong>GST Amount:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->gst_amount }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="total_amount" class="col-md-4 col-form-label text-md-end text-start"><strong>Total Amount:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->total_amount }}
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="offer_status" class="col-md-4 col-form-label text-md-end text-start"><strong>Offer Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $offer->offer_status }}
                        </div>
                    </div>
                    




            </div>
        </div>
    </div>    
</div>
    
@endsection