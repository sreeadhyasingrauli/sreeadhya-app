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
            <div class="card-header">Product List</div>
            <div class="card-body">
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Products</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Part Number</th>
                        <th scope="col">Part Description</th>
                        <th scope="col">Make</th>
                        <th scope="col">Unit Of Measurement</th>
                        <th scope="col">Price</th>
                        <th scope="col">HSN Code</th>
                        <th scope="col">GST Rate</th>
                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->part_number }}</td>
                            <td>{{ $product->part_description }}</td>
                            <td>{{ $product->make }}</td>
                            <td>{{ $product->uom}}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->hsn_code }}</td>
                            <td>{{ $product->gst_rate}}</td>
                            

                            <td>
                                <form action="{{ route('products.destroy', $product->product_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Customer Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $products->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection