@extends('products.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Inventory List</div>
            <div class="card-body">
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Products</a>
                <a href="{{ route('stock.pdf') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Download Inventory</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Part Number</th>
                        <th scope="col">Alternate Part Number</th>
                        <th scope="col">Part Description</th>
                        <th scope="col">Make</th>
                        <th scope="col">Unit Of Measurement</th>
                        <th scope="col">Price</th>
                        <th scope="col">HSN Code</th>
                        <th scope="col">GST Rate</th>
                        <th scope="col">Current Stock</th>
                        <th scope="col">Alert Level</th>
                        <th scope="col">Stock Action</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->part_number }}</td>
                            <td>{{ $product->alt_part_number }}</td>
                            <td>{{ $product->part_description }}</td>
                            <td>{{ $product->make }}</td>
                            <td>{{ $product->uom}}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->hsn_code }}</td>
                            <td>{{ $product->gst_rate}}</td>
                            <td>{{ $product->current_stock}}</td>
                            <td>{{ $product->alert_level}}</td>

                            <td>
                            
                            <td class="p-2">
                                <!-- Fast Entry Stock Modifying form -->
                                <form action="{{ route('inventory.adjustStock', $product->product_id) }}" method="POST" class="flex items-center justify-end space-x-1">
                                    @csrf
                                    <select name="type" class="border p-1 text-sm rounded">
                                        <option value="in">+ Add</option>
                                        <option value="out">- Remove</option>
                                    </select>
                                    <input type="number" name="quantity" min="1" placeholder="Qty" required class="w-16 border p-1 text-sm rounded">
                                    <input type="text" name="reference" placeholder="Reason" class="w-20 border p-1 text-sm rounded">
                                    <button type="submit" class="bg-gray-800 text-blue px-2 py-1 text-xs rounded hover:bg-gray-900">Go</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
     

@endsection