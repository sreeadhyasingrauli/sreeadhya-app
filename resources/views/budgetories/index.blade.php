@extends('budgetories.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Budgetory Offer List</div>
            <div class="card-body">
                <a href="{{ route('budgetories.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Budgetory</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Budgetory Number</th>
                        <th scope="col">Budgetory Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address To</th>
                        <th scope="col">Budget Description</th>
                        <th scope="col">Budget Amount</th>
                        <th scope="col">Payment Terms</th>
                        <th scope="col">Delivery Terms</th>
                        <th scope="col">Warranty Terms</th>
                        <th scope="col">Offer Validity</th>
                        <th scope="col">Validity End Date</th>
                        <th scope="col">Status</th>

                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($budgetories as $budgetory)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $budgetory->budgetory_number }}</td>
                            <td>{{ $budgetory->budgetory_date }}</td>
                            <td>{{ $budgetory->customer_name }}</td>
                            <td>{{ $budgetory->address_to }}</td>
                            <td>{{ $budgetory->budget_description }}</td>
                            <td>{{ $budgetory->budget_amount }}</td>
                            <td>{{ $budgetory->payment_terms }}</td>
                            <td>{{ $budgetory->delivery_terms }}</td>
                            <td>{{ $budgetory->warranty_terms }}</td>
                            <td>{{ $budgetory->offer_validity }}</td>
                            <td>{{ $budgetory->validity_end_date }}</td>
                            <td>{{ $budgetory->status }}</td>

                            <td>
                                <form action="{{ route('budgetories.destroy', $budgetory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('budgetories.show', $budgetory->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('budgetories.edit', $budgetory->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this budgetory?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Budgetory Offer Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $budgetories->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection