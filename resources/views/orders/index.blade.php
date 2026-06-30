@extends('orders.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Order List</div>
            <div class="card-body">
                <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Order</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                       
                        <th scope="col">PO Number</th>
                        <th scope="col">Grand Totall</th>
                        <th scope="col">Status</th>
                        <th scope="col">Shipping Address</th>
                       
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($order as $order)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            
                            <td>{{ $order->po_number }}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            
                             


                            <td>
                                <form action="{{ route('orders.destroy', $order->user_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('orders.show', $order->user_id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('orders.edit', $order->user_id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Offer?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Offer Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $order->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection