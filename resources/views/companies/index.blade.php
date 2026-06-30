@extends('companies.app')

@section('content')
 <div style="font-size: {{ $fontSize }};">
   

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Company List</div>
            <div class="card-body">
                <a href="{{ route('companies.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Company</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Company Name</th>
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
                        <th scope="col">Banker's Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">IFSC Code</th>
                        <th scope="col">Branch Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->address_line1 }}</td>
                            <td>{{ $company->address_line2 }}</td>
                            <td>{{ $company->city }}</td>
                            <td>{{ $company->state }}</td>
                            <td>{{ $company->pin_code }}</td>
                            <td>{{ $company->country }}</td>
                            <td>{{ $company->contact_number }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->pan_number }}</td>
                            <td>{{ $company->gst_number }}</td>
                            <td>{{ $company->bank_name }}</td>
                            <td>{{ $company->account_number }}</td>
                            <td>{{ $company->ifsc_code }}</td>
                            <td>{{ $company->branch_name }}</td>

                            <td>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this company?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Company Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $companies->links() }}

            </div>
        </div>
    </div>    
</div>
    </div>
@endsection