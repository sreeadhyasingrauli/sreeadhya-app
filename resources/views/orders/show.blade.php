@extends('orders.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Order Information
                </div>
                <div class="float-end">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                    
                    <div class="row">
                        <label for="po_number" class="col-md-4 col-form-label text-md-end text-start"><strong>PO Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $order->po_number }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="grand_total" class="col-md-4 col-form-label text-md-end text-start"><strong>Grand Total:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $order->grand_total }}
                        </div>
                    </div>
                    
                        
                    
                    
                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $order->status }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="shipping_address" class="col-md-4 col-form-label text-md-end text-start"><strong>Shipping Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $order->shipping_address }}
                        </div>
                    </div>
                    
                    




            </div>
        </div>
    </div>    
</div>
    
@endsection