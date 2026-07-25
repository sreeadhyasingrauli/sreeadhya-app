@extends('challans.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Challan
                </div>
                <div class="float-end">
                    <a href="{{ route('challans.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('challans.store') }}" method="post">
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
                        <label for="challan_number" class="col-md-4 col-form-label text-md-end text-start">Challan Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('challan_number') is-invalid @enderror" id="challan_number" name="challan_number" value="{{ old('challan_number') }}">
                            @error('challan_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="challan_date" class="col-md-4 col-form-label text-md-end text-start">Challan Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('challan_date') is-invalid @enderror" id="challan_date" name="challan_date" value="{{ old('challan_date') }}">
                            @error('challan_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="order_number"> Order Number</label>
                    <select name="order_number" id="order_number" class="form-control">
                      <option value="">Select Order</option>
                     @foreach ($allOrders as $order)
                        <option value="{{ $order->order_number }}">
                         {{ $order->order_number }}
                        </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="order_date" class="col-md-4 col-form-label text-md-end text-start">Order Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('order_date') is-invalid @enderror" id="order_date" name="order_date" value="{{ old('order_date') }}">
                            @error('order_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    
                     <div class="mb-3 row">
                        <label for="vehicle_number" class="col-md-4 col-form-label text-md-end text-start">Vehicle Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('vehicle_number') is-invalid @enderror" id="vehicle_number" name="vehicle_number" value="{{ old('vehicle_number') }}">
                            @error('vehicle_number')
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
            @foreach ($allOrderItems as $orderitems)
                <option value="{{ $orderitems->part_number }}">{{ $orderitems->order_id }}-{{ $orderitems->part_number }}</option>
            @endforeach
        </select>

        <!-- Quantity -->
        <div class="mb-0">
            <label class="d-none">Quantity</label>
            <input type="number" name="items[0][quantity]" class="form-control" min="1" placeholder="Qty" required>
        </div>
    
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