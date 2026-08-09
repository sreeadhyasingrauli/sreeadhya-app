@extends('commercial-offers.app')

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
                    Edit Commercial Offer
                </div>
                <div class="float-end">
                    <a href="{{ route('commercialoffer.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('commercialoffer.update', $commercialoffer->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    
                    
                    <div class="mb-3 row">
                        <label for="customer_id" class="col-md-4 col-form-label text-md-end text-start">Customer </label>
                        <div class="col-md-6">
                          <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                                <option value="">Select Customer </option>
                                @foreach ($allCustomers as $Customers)
                                    <option value="{{ $Customers->customer_id }}" {{ $offer->customer_id == $Customers->customer_id ? 'selected' : '' }}>{{ $Customers->customer_name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="offer_number" class="col-md-4 col-form-label text-md-end text-start">Commercial Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('offer_number') is-invalid @enderror" id="offer_number" name="offer_number" value="{{ $commercialoffer->offer_number }}">
                            @error('offer_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="offer_date" class="col-md-4 col-form-label text-md-end text-start">Offer Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('offer_date') is-invalid @enderror" id="offer_date" name="offer_date" value="{{ $commercialoffer->offer_date }}">
                            @error('offer_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="enquiry_number" class="col-md-4 col-form-label text-md-end text-start">Enquiry Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('enquiry_number') is-invalid @enderror" id="enquiry_number" name="enquiry_number" value="{{ $commercialoffer->enquiry_number }}">
                            @error('enquiry_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="enquiry_date" class="col-md-4 col-form-label text-md-end text-start">Enquiry Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('enquiry_date') is-invalid @enderror" id="enquiry_date" name="enquiry_date" value="{{ $commercialoffer->enquiry_date }}">
                            @error('enquiry_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="validity" class="col-md-4 col-form-label text-md-end text-start">Validity</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('validity') is-invalid @enderror" id="validity" name="validity" value="{{ $commercialoffer->validity }}">
                            @error('validity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="payment_terms" class="col-md-4 col-form-label text-md-end text-start">Payment Terms </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('payment_terms') is-invalid @enderror" id="payment_terms" name="payment_terms" value="{{ $commercialoffer->payment_terms }}">
                            @error('payment_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gst_terms" class="col-md-4 col-form-label text-md-end text-start">GST  </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('gst_terms') is-invalid @enderror" id="gst_terms" name="gst_terms" value="{{ $commercialoffer->gst_terms }}">
                            @error('gst_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="delivery_terms" class="col-md-4 col-form-label text-md-end text-start">Delivery Terms </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('delivery_terms') is-invalid @enderror" id="delivery_terms" name="delivery_terms" value="{{ $commercialoffer->delivery_terms }}">
                            @error('delivery_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="discount" class="col-md-4 col-form-label text-md-end text-start">Discount </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ $commercialoffer->discount }}">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pricebasis_terms" class="col-md-4 col-form-label text-md-end text-start">Basis Of Price </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('pricebasis_terms') is-invalid @enderror" id="pricebasis_terms" name="pricebasis_terms" value="{{ $commercialoffer->pricebasis_terms }}">
                            @error('pricebasis_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="guarantee_terms" class="col-md-4 col-form-label text-md-end text-start">Warranty/Guarantee </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('guarantee_terms') is-invalid @enderror" id="guarantee_terms" name="guarantee_terms" value="{{ $commercialoffer->guarantee_terms }}">
                            @error('guarantee_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                     <div class="mb-3 row">
                        <label for="other_terms" class="col-md-4 col-form-label text-md-end text-start">Other Terms </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('other_terms') is-invalid @enderror" id="other_terms" name="other_terms" value="{{ $commercialoffer->other_terms }}">
                            @error('other_terms')
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