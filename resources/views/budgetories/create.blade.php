@extends('budgetories.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Budgetory Offer
                </div>
                <div class="float-end">
                    <a href="{{ route('budgetories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('budgetories.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="budgetory_number" class="col-md-4 col-form-label text-md-end text-start">Budgetory Number</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('budgetory_number') is-invalid @enderror" id="budgetory_number" name="budgetory_number" value="{{ old('budgetory_number') }}">
                            @error('budgetory_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="budgetory_date" class="col-md-4 col-form-label text-md-end text-start">Budgetory Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('budgetory_date') is-invalid @enderror" id="budgetory_date" name="budgetory_date" value="{{ old('budgetory_date') }}">
                            @error('budgetory_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="customer_name" class="col-md-4 col-form-label text-md-end text-start">Customer Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ old('customer_name') }}">
                        
                            @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address_to" class="col-md-4 col-form-label text-md-end text-start">Address To</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('address_to') is-invalid @enderror" id="address_to" name="address_to" value="{{ old('address_to') }}">
                        
                            @error('address_to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    







                    <div class="mb-3 row">
                        <label for="budgetory_description" class="col-md-4 col-form-label text-md-end text-start">Budgetory Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('budgetory_description') is-invalid @enderror" id="budgetory_description" name="budgetory_description" value="{{ old('budgetory_description') }}">
                        
                            @error('budgetory_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="budgetory_amount" class="col-md-4 col-form-label text-md-end text-start">Budgetory Amount</label>
                        <div class="col-md-6">
                            <input type="number" step="0.01" class="form-control @error('budgetory_amount') is-invalid @enderror" id="budgetory_amount" name="budgetory_amount" value="{{ old('budgetory_amount') }}">
                        
                            @error('budgetory_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="payment_terms" class="col-md-4 col-form-label text-md-end text-start">Payment Terms</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('payment_terms') is-invalid @enderror" id="payment_terms" name="payment_terms" value="{{ old('payment_terms') }}">
                        
                            @error('payment_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="delivery_terms" class="col-md-4 col-form-label text-md-end text-start">Delivery Terms</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('delivery_terms') is-invalid @enderror" id="delivery_terms" name="delivery_terms" value="{{ old('delivery_terms') }}">
                        
                            @error('delivery_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="warranty_terms" class="col-md-4 col-form-label text-md-end text-start">Warranty Terms</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('warranty_terms') is-invalid @enderror" id="warranty_terms" name="warranty_terms" value="{{ old('warranty_terms') }}">
                        
                            @error('warranty_terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                     <div class="mb-3 row">
                        <label for="offer_validity" class="col-md-4 col-form-label text-md-end text-start">Offer Validity</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('offer_validity') is-invalid @enderror" id="offer_validity" name="offer_validity" value="{{ old('offer_validity') }}">
                        
                            @error('offer_validity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="validity_end_date" class="col-md-4 col-form-label text-md-end text-start">Offer Validity End Date</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('validity_end_date') is-invalid @enderror" id="validity_end_date" name="validity_end_date" value="{{ old('validity_end_date') }}">
                        
                            @error('validity_end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                        
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Budgetory Offer">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection