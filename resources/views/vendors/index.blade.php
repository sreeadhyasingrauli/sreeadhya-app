@extends('vendors.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Vendor List</div>
            <div class="card-body">
                <a href="{{ route('vendors.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Vendor</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                         <th scope="col">Vendor Name</th>
                         <th scope="col">Address Line 1</th>
                        <th scope="col">Address Line 2</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pin Code</th>
                        <th scope="col">Country</th>
                        
                        <th scope="col">GST Number</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($vendors as $vendor)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                             <td>{{ $vendor->vendor_name }}</td>
                            <td>{{ $vendor->address_line1 }}</td>
                            <td>{{ $vendor->address_line2 }}</td>
                            <td>{{ $vendor->city }}</td>
                            <td>{{ $vendor->state }}</td>
                            <td>{{ $vendor->pin_code }}</td>
                            <td>{{ $vendor->country }}</td>
                            <td>{{ $vendor->gst_number }}</td>

                            <td>
                                <form action="{{ route('vendors.destroy', $vendor->vendor_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('vendors.show', $vendor->vendor_id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('vendors.edit', $vendor->vendor_id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this vendor?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Vendor Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $vendors->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection