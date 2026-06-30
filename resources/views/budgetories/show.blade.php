@extends('budgetories.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Budgetory Offer Details
                </div>
                <div class="float-end">
                    <a href="{{ route('budgetories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    

                    <div class="row">
                        <label for="budgetory_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Budgetory Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->budgetory_number }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="budgetory_date" class="col-md-4 col-form-label text-md-end text-start"><strong>Budgetory Date:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->budgetory_date }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="customer_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->customer_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address_to" class="col-md-4 col-form-label text-md-end text-start"><strong>Address To:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->address_to }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="budget_description" class="col-md-4 col-form-label text-md-end text-start"><strong>Budget Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->budget_description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="budget_amount" class="col-md-4 col-form-label text-md-end text-start"><strong>Budget Amount:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->budget_amount }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="payment_terms" class="col-md-4 col-form-label text-md-end text-start"><strong>Payment Terms:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->payment_terms }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="delivery_terms" class="col-md-4 col-form-label text-md-end text-start"><strong>Delivery Terms:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->delivery_terms }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="warranty_terms" class="col-md-4 col-form-label text-md-end text-start"><strong>Warranty Terms:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->warranty_terms }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="offer_validity" class="col-md-4 col-form-label text-md-end text-start"><strong>Offer Validity:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->offer_validity }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="validity_end_date" class="col-md-4 col-form-label text-md-end text-start"><strong>Validity End Date:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->validity_end_date }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $budgetory->status }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection