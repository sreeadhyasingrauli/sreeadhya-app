@extends('vendors.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Vendor  
                </div>
                <div class="float-end">
                    <a href="{{ route('vendors.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('vendors.update', $vendor->vendor_id) }}" method="post">
                    @csrf
                    @method("PUT")

                    
                    <div class="mb-3 row">
                        <label for="vendor_name" class="col-md-4 col-form-label text-md-end text-start">Vendor Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('vendor_name') is-invalid @enderror" id="vendor_name" name="vendor_name" value="{{ $vendor->vendor_name }}">
                            @error('vendor_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    

                    
                    <div class="mb-3 row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start">Country</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ $vendor->country }}">
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start">State</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $vendor->state }}">
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start">City</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ $vendor->city }}">
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <label for="pin_code" class="col-md-4 col-form-label text-md-end text-start">Pin Code</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" name="pin_code" value="{{ $vendor->pin_code }}">
                            @error('pin_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address_line1" class="col-md-4 col-form-label text-md-end text-start">Address Line 1</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('address_line1') is-invalid @enderror" id="address_line1" name="address_line1" value="{{ $vendor->address_line1 }}">
                            @error('address_line1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address_line2" class="col-md-4 col-form-label text-md-end text-start">Address Line 2</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('address_line2') is-invalid @enderror" id="address_line2" name="address_line2" value="{{ $vendor->address_line2 }}">
                            @error('address_line2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    
                    
                    <div class="mb-3 row">
                        <label for="gst_number" class="col-md-4 col-form-label text-md-end text-start">GST Number</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('gst_number') is-invalid @enderror" id="gst_number" name="gst_number" value="{{ $vendor->gst_number }}">
                            @error('gst_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection