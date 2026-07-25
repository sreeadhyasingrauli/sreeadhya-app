@extends('vendors.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Vendor Information
                </div>
                <div class="float-end">
                    <a href="{{ route('vendors.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                   
                    <div class="row">
                        <label for="vendor_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Vendor Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->vendor_name }}
                        </div>
                    </div>
                    

                    <div class="row">
                        <label for="address_line1" class="col-md-4 col-form-label text-md-end text-start"><strong>Address Line 1:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->address_line1 }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address_line2" class="col-md-4 col-form-label text-md-end text-start"><strong>Address Line 2:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->address_line2 }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start"><strong>City:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->city }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start"><strong>State:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->state }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="pin_code" class="col-md-4 col-form-label text-md-end text-start"><strong>Pin Code:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->pin_code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start"><strong>Country:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->country }}
                        </div>
                    </div>

                    

                    
                    <div class="row">
                        <label for="gst_number" class="col-md-4 col-form-label text-md-end text-start"><strong>GST Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $vendor->gst_number }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection