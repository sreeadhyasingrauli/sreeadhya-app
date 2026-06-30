@extends('customers.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Customer List</div>
            <div class="card-body">
                <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Customer</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Address To</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Short Name</th>
                        <th scope="col">Address Line 1</th>
                        <th scope="col">Address Line 2</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pin Code</th>
                        <th scope="col">Country</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">PAN Number</th>
                        <th scope="col">GST Number</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $customer->address_to }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->customer_short_name }}</td>
                            <td>{{ $customer->address_line1 }}</td>
                            <td>{{ $customer->address_line2 }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->state }}</td>
                            <td>{{ $customer->pin_code }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>{{ $customer->contact_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->website }}</td>
                            <td>{{ $customer->pan_number }}</td>
                            <td>{{ $customer->gst_number }}</td>

                            <td>
                                <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('customers.show', $customer->customer_id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this customer?');"><i class="bi bi-trash"></i> Delete</button>
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

                  {{ $customers->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection