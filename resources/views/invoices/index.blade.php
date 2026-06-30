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
            <div class="card-header">Invoice List</div>
            <div class="card-body">
                <a href="{{ route('invoices.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Invoice</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">PO ID</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Invoice Date</th>
                        
                        
                        <th scope="col">Basic Amount</th>
                        <th scope="col">GST Amount</th>
                        <th scope="col">Invoice Amount</th>
                           <th scope="col">Received Amount</th>
                           <th scope="col">Balance Amount</th>
                        <th scope="col">Invoice Status</th>
                         <th scope="col">Payment Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ( $invoices as $inv)
                        <tr>
                            <th scope="row">{{ $inv->id }}</th>
                             <td>{{ $inv->customer_id }}</td>
                             <td>{{ $inv->order_id }}</td>
                            <td>{{ $inv->invoice_number }}</td>
                            <td>{{ $inv->invoice_date }}</td>
                                                      
                            <td>{{ $inv->basic_amount }}</td>
                            <td>{{ $inv->gst_amount }}</td>
                            <td>{{ $inv->invoice_amount }}</td>
                            <td>{{ $inv->received_amount }}</td>
                            <td>{{ $inv->balance_amount }}</td>
                            <td>{{ $inv->invoice_status }}</td>
                            <td>{{ $inv->payment_status }}</td>
                                                  
                             


                            <td>
                                <form action="{{ route('invoices.destroy', $inv->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('invoices.pdf', $inv->id) }}" class="btn btn-primary btn-sm"> Download</a>
                                    <a href="{{ route('invoices.show', $inv->id) }}" class="btn btn-primary btn-sm"> Payment Received</a>


                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Invoice?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Invoice Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $invoices->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection
