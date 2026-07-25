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
                        <th scope="col">Customer ID</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Order Date</th>
                         <th scope="col">Valid Until</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">GST Amount</th>
                        <th scope="col">Total Value</th>
                        <th scope="col">Payment Terms</th>
                        <th scope="col">Delivery Terms</th>
                        <th scope="col">PF Terms</th>
                        <th scope="col">Status</th>
                                             
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($order as $ord)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{  $ord->customer_id }}</td>
                            <td>{{ $ord->order_number }}</td>
                             <td>{{ $ord->order_date }}</td>
                              <td>{{ $ord->valid_until }}</td>
                            <td>{{ $ord->sub_total }}</td>
                            <td>{{ $ord->gst_amount }}</td>
                            <td>{{ $ord->total_value }}</td>
                            <td>{{ $ord->payment_terms }}</td>
                            <td>{{ $ord->delivery_terms }}</td>
                             <td>{{ $ord->pf_terms }}</td>
                            <td>{{ $ord->order_status }}</td>
                   
                            <td>
                                <form action="{{ route('orders.destroy', $ord->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('orders.order-acceptance', $ord->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Download Order Acceptance</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Order?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Order Found!</strong>
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