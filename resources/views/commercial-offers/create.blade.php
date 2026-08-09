@extends('commercial-offers.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Commercial Offer
                </div>
                <div class="float-end">
                    <a href="{{ route('commercial-offers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('commercial-offers.store') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                    <label for="customer_id"> Customer ID</label>
                    <select name="customer_id" id="customer_id" class="form-control">
                      <option value="">Select Customer</option>
                     @foreach ($allCustomers as $customer)
                        <option value="{{ $customer->customer_id }}">
                         {{ $customer->customer_name }}
                        </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="offer_number" class="col-md-4 col-form-label text-md-end text-start">Offer Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('offer_number') is-invalid @enderror" id="offer_number" name="offer_number" value="{{ old('offer_number') }}">
                            @error('offer_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="offer_date" class="col-md-4 col-form-label text-md-end text-start">Offer Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('offer_date') is-invalid @enderror" id="offer_date" name="offer_date" value="{{ old('offer_date') }}">
                            @error('offer_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="enquiry_number" class="col-md-4 col-form-label text-md-end text-start">Enquiry Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('enquiry_number') is-invalid @enderror" id="enquiry_number" name="enquiry_number" value="{{ old('enquiry_number') }}">
                            @error('enquiry_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="enquiry_date" class="col-md-4 col-form-label text-md-end text-start">Enquiry Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('enquiry_date') is-invalid @enderror" id="enquiry_date" name="enquiry_date" value="{{ old('enquiry_date') }}">
                            @error('enquiry_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="validity" class="col-md-4 col-form-label text-md-end text-start">Validity</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('validity') is-invalid @enderror" id="validity" name="validity" value="{{ old('validity') }}">
                            @error('validity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="payment_terms" class="col-md-4 col-form-label text-md-end text-start">Payment Terms :</label>
                        <div class="col-md-6">
                          <select class="form-control @error('payment_terms') is-invalid @enderror" id="payment_terms" name="payment_terms">
                                <option value="">Select Payment Terms</option>
                                <option value="100% within 21 days" {{ old('payment_terms') == '1' ? 'selected' : '' }}>100% within 21 days</option>
                                <option value="100% within 30 days" {{ old('payment_terms') == '2' ? 'selected' : '' }}>100% within 30 days</option>
                                <option value="Accepted as per your NIT/Enquiry" {{ old('payment_terms') == '3' ? 'selected' : '' }}>Accepted as per your NIT/Enqiry</option>
                            </select>
                            @error('payment_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gst_terms" class="col-md-4 col-form-label text-md-end text-start">GST :</label>
                        <div class="col-md-6">
                          <select class="form-control @error('gst_terms') is-invalid @enderror" id="gst_terms" name="gst_terms">
                                <option value="">Select GST Terms</option>
                                <option value="Extra GST @18%" {{ old('gst_terms') == '1' ? 'selected' : '' }}>Extra GST @18%</option>
                                <option value="Extra as per applicable" {{ old('gst_terms') == '2' ? 'selected' : '' }}>Extra as per applicable</option>
                            </select>
                            @error('gst_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="delivery_terms" class="col-md-4 col-form-label text-md-end text-start">Delivery : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('delivery_terms') is-invalid @enderror" id="delivery_terms" name="delivery_terms" value="{{ old('delivery_terms') }}">
                            @error('delivery_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="discount" class="col-md-4 col-form-label text-md-end text-start">Discount : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount') }}">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pricebasis_terms" class="col-md-4 col-form-label text-md-end text-start">Basis Of Price : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('pricebasis_terms') is-invalid @enderror" id="pricebasis_terms" name="pricebasis_terms" value="{{ old('pricebasis_terms') }}">
                            @error('pricebasis_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="guarantee_terms" class="col-md-4 col-form-label text-md-end text-start">Guarantee/Waranty : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('guarantee_terms') is-invalid @enderror" id="guarantee_terms" name="guarantee_terms" value="{{ old('guarantee_terms') }}">
                            @error('guarantee_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="other_terms" class="col-md-4 col-form-label text-md-end text-start">Any Other : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('other_terms') is-invalid @enderror" id="other_terms" name="other_terms" value="{{ old('other_terms') }}">
                            @error('other_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
             
        
       
            
            
                    <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
           
@endsection