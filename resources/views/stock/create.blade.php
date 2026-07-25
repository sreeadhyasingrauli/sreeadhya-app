<!-- resources/views/stock/create.blade.php -->
<@extends('stock.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Stock
                </div>
                <div class="float-end">
                    <a href="{{ route('stock.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('stock.store') }}" method="post">
                    @csrf
                <div class="grid grid-cols-1 gap-6">
                        
                       
                        <!-- SKU Code -->
                        <div class="form-group">
                    <label for="product_id"> Product ID</label>
                    <select name="product_id" id="product_id" class="form-control">
                      <option value="">Select Product</option>
                     @foreach ($allProducts as $product)
                        <option value="{{ $product->product_id }}">
                         {{ $product->part_number }}
                        </option>
                        @endforeach
                    </select>
                    </div>
                        
                    <div class="mb-3 row">
                        <label for="type" class="col-md-4 col-form-label text-md-end text-start">Type :</label>
                        <div class="col-md-6">
                          <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                <option value="">Select Type</option>
                                <option value="in" {{ old('type') == 'in' ? 'selected' : '' }}>Stock In</option>
                                <option value="out" {{ old('type') == 'out' ? 'selected' : '' }}>Stock Out</option>
                                <option value="adjustment" {{ old('type') == 'adjustment' ? 'selected' : '' }}>Adjustment</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                        <!-- Quantity and Price Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Stock Quantity -->
                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 0) }}" min="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('quantity')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                             <!-- Quantity and Price Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Stock Quantity -->
                            <div>
                                <label for="reference" class="block text-sm font-medium text-gray-700">Reference</label>
                                <input type="text" name="reference" id="reference" value="{{ old('reference') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('reference')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>

                            
                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-3 mt-4">
                            <a href="{{ route('stock.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-blue rounded-md hover:bg-indigo-700 transition">
                                Save Stock Transaction
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
