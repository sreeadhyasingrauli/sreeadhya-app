@extends('payments.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Payment Of Invoice List</div>
            <div class="card-body">
                <a href="{{ route('payments.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Payment</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID#</th>
                        <th scope="col">Customer ID</th>
                        
                        <th scope="col">Invoice Number</th>
                       
                        <th scope="col">Invoice Amount</th>
                           <th scope="col">Received Amount</th>
                           <th scope="col">Balance Amount</th>
                        <th scope="col">Status</th>
                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ( $payments as $inv)
                        <tr>
                            <th scope="row">{{ $inv->id }}</th>
                             <td>{{ $inv->customer_id }}</td>
                            <td>{{ $inv->invoice_number }}</td>
                           <td>{{ $inv->invoice_amount }}</td>
                            <td>{{ $inv->received_amount }}</td>
                            <td>{{ $inv->balance_amount }}</td>
                            <td>{{ $inv->status }}</td>
                                                  
                             


                            <td>
                                <form action="{{ route('payments.destroy', $inv->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                  
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

                  {{ $payments->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection
