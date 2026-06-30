@extends('orders.app')

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
                    Edit Offer
                </div>
                <div class="float-end">
                    <a href="{{ route('offers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('offers.update', $offer->offer_id) }}" method="post">
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
                        <label for="offer_number" class="col-md-4 col-form-label text-md-end text-start">Bill Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('offer_number') is-invalid @enderror" id="offer_number" name="offer_number" value="{{ $offer->offer_number }}">
                            @error('offer_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="valid_until" class="col-md-4 col-form-label text-md-end text-start">Valid Until (Date)</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('valid_until') is-invalid @enderror" id="valid_until" name="valid_until" value="{{ $offer->valid_until }}">
                            @error('valid_until')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="mb-3 row">
                        <label for="subtotal" class="col-md-4 col-form-label text-md-end text-start">Sub Total</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" name="subtotal" value="{{ $offer->subtotal }}" step="0.01">
                            @error('subtotal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gst_amount" class="col-md-4 col-form-label text-md-end text-start">GST Amount</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('gst_amount') is-invalid @enderror" id="gst_amount" name="gst_amount" value="{{ $billsPayable->gst_amount }}" step="0.01">
                            @error('gst_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="total_amount" class="col-md-4 col-form-label text-md-end text-start">Billed Amount</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('total_amount') is-invalid @enderror" id="total_amount" name="total_amount" value="{{ $offer->total_amount }}" step="0.01">
                            @error('total_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                   


                    
                    <div class="mb-3 row">
                        <label for="offer_status" class="col-md-4 col-form-label text-md-end text-start">Offer Status</label>
                        <div class="col-md-6">
                          <select class="form-control @error('offer_status') is-invalid @enderror" id="offer_status" name="offer_status">
                                <option value="">Select Offer Status</option>
                                <option value="submited" {{ $offer->offer_status == 'submited' ? 'selected' : '' }}>Submited</option>
                                
                            </select>
                            @error('offer_status')
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