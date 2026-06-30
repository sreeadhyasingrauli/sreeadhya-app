<!-- resources/views/invoices/show.blade.php -->
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Offer Information
                </div>
                <div class="float-end">
                   
<form action="{{ route('payments.store') }}" method="POST">
    @csrf

    

    <div class="mb-3 row">
                        <label for="amount_received" class="col-md-4 col-form-label text-md-end text-start">Amount Received</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('amount_received') is-invalid @enderror" id="amount_received" name="amount_received" value="{{ old('amount_received') }}">
                            @error('amount_received')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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