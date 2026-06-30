@extends('offers.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Offer
                </div>
                <div class="float-end">
                    <a href="{{ route('offers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('offers.store') }}" method="post">
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
                        <label for="valid_until" class="col-md-4 col-form-label text-md-end text-start">Valid Until (Date)</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('valid_until') is-invalid @enderror" id="valid_until" name="valid_until" value="{{ old('valid_until') }}">
                            @error('valid_until')
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
                                <option value="Accepted as per your NIT/Offer" {{ old('payment_terms') == '2' ? 'selected' : '' }}>Accepted as per your NIT/Offer</option>
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
                        <label for="pf_terms" class="col-md-4 col-form-label text-md-end text-start">Packing & Forwarding (P&F) : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('pf_terms') is-invalid @enderror" id="pf_terms" name="pf_terms" value="{{ old('pf_terms') }}">
                            @error('pf_terms')
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
                        <label for="ld_terms" class="col-md-4 col-form-label text-md-end text-start">LD Clause : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('ld_terms') is-invalid @enderror" id="ld_terms" name="ld_terms" value="{{ old('ld_terms') }}">
                            @error('ld_terms')
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
                    
             
        <!-- Initial Item Row -->
         <div id="items-container">
    <div class="item-row mb-3 d-flex gap-2 align-items-center">
        <!-- Part Number -->
        <select name="items[0][part_number]" class="form-control" required>
            <option value="">Select Part Number</option>
            @foreach ($allProducts as $product)
                <option value="{{ $product->part_number }}">{{ $product->part_number }}</option>
            @endforeach
        </select>

        <!-- Description -->
        <div class="mb-0">
            <label class="d-none">Part Description</label>
            <input type="text" name="items[0][part_description]" class="form-control" placeholder="Description" required>
        </div>

        <!-- Quantity -->
        <div class="mb-0">
            <label class="d-none">Quantity</label>
            <input type="number" name="items[0][quantity]" class="form-control" min="1" placeholder="Qty" required>
        </div>

        <!-- UoM -->
        <div class="mb-0">
            <label class="d-none">Unit Of Measurement</label>
            <input type="text" name="items[0][uom]" class="form-control" placeholder="UoM" required>
        </div>

        <!-- Price -->
        <div class="mb-0">
            <label class="d-none">Price</label>
            <input type="number" step="0.01" name="items[0][price]" class="form-control" placeholder="Price" min="0" required>
        </div>

        <!-- Remove Button -->
        <button type="button" class="btn btn-danger remove-item">X</button>
    </div>
</div>

<button type="button" class="btn btn-primary mt-2" id="add-item">+ Add Row</button>

            
            
                    <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
            <!-- JavaScript to add rows -->
<script>
    let itemIndex = 1;
    document.addEventListener('DOMContentLoaded', function () {
    let itemIndex = 0;
    const container = document.getElementById('items-container');
    const addButton = document.getElementById('add-item');

    // Add new row
    addButton.addEventListener('click', function () {
        itemIndex++;
        // Clone the first item row
        let newRow = container.querySelector('.item-row').cloneNode(true);

        // Reset values and update names/IDs
        newRow.querySelectorAll('input, select').forEach(function (element) {
            if (element.tagName === 'SELECT') {
                element.selectedIndex = 0;
            } else {
                element.value = ''; // Clear inputs
            }

            // Replace the index (items[0] -> items[1], items[2], etc.)
            let name = element.getAttribute('name');
            if (name) {
                let newName = name.replace(/items\[\d+\]/, `items[${itemIndex}]`);
                element.setAttribute('name', newName);
            }
            let id = element.getAttribute('id');
            if (id) {
                let newId = id.replace(/items\[\d+\]/, `items[${itemIndex}]`);
                element.setAttribute('id', newId);
            }
        });

        // Append the new row
        container.appendChild(newRow);
    });

    // Remove row
    container.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            // Ensure at least one row remains
            if (container.querySelectorAll('.item-row').length > 1) {
                e.target.closest('.item-row').remove();
            }
        }
    });
});

</script>
@endsection