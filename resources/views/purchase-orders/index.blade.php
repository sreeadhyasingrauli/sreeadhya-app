@extends('purchase-orders.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Purchase Order List</div>
            <div class="card-body">
                <a href="{{ route('purchase-orders.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Purchase Order</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">PO Number</th>
                        <th scope="col">PO Date</th>
                        <th scope="col">Delivery End Date</th>
                        <th scope="col">BASIC AMOUNT</th>
                        <th scope="col">GST AMOUNT</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ( $purchaseorder as $po)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                             <td>{{ $po->customer_id }}</td>
                            <td>{{ $po->po_number }}</td>
                            <td>{{ $po->po_date }}</td>
                            <td>{{ $po->del_end_date }}</td>
                            <td>{{ $po->basic_value }}</td>
                            <td>{{ $po->gst_value }}</td>
                            <td>{{ $po->total_value }}</td>
                            <td>{{ $po->status }}</td>
                            
                            <td>
                                <form action="{{ route('purchase-orders.destroy', $po->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('purchase-orders.order-acceptance', $po->id) }}" class="btn btn-primary"> Download</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this PO?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Purchase Order Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $purchaseorder->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection