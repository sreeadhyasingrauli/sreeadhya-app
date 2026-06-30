<!-- resources/views/invoices/show.blade.php -->
@extends('invoices.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Payment  Information
                </div>
                <div class="float-end">
                   
<form action="{{ route('payments.store', $invoice->id) }}" method="POST">
    @csrf

    <h3>Record Payment Received</h3>
    <p>Total Invoice Due: <strong>{{ number_format($invoice->balance_amount, 2) }}</strong></p>

    <div>
        <label>Amount Received </label>
        <input type="number" name="amount_received" step="0.01" max="{{ $invoice->balance_amount }}" required>
    </div>

    <div>
        <label>Payment Date</label>
        <input type="date" name="payment_date" value="{{ date('Y-m-d') }}" required>
    </div>

    <div>
        <label>Payment Method</label>
        <select name="payment_method" required>
            <option value="bank_transfer">Bank Transfer</option>
            <option value="cash">Cash</option>
            <option value="stripe">Stripe Gateway</option>
        </select>
    </div>

    <div>
        <label>Transaction ID Reference</label>
        <input type="text" name="transaction_id">
    </div>

    <button type="submit">Log Payment Receipt</button>
</form>
 </div>
        </div>
    </div>    
</div>
</div>
@endsection