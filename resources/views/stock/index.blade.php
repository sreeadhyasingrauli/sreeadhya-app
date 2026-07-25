@extends('stock.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Stock List</div>
            <div class="card-body">
                <a href="{{ route('stock.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Stock-In/Stock-Out</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Reference</th>
                       
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($stockTransactions as $transaction)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $transaction->product_id }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>{{ $transaction->reference}}</td>
                            

                            <td>
                                <form action="{{ route('stock.destroy', $transaction->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('stock.stockIn', $transaction->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Stock-In</a>

                                    <a href="{{ route('stock.stockOut', $transaction->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Stock-Out</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Stock Item Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $stockTransactions->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection