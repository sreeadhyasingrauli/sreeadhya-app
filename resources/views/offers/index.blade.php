@extends('offers.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Offer List</div>
            <div class="card-body">
                <a href="{{ route('offers.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Offer</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Offer Number</th>
                        <th scope="col">Offer Date</th>
                        <th scope="col">Valid Until</th>
                        
                        <th scope="col">Sub Total</th>
                        <th scope="col">GST Amount</th>
                        <th scope="col">Total Amount</th>
                         
                 
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($offer as $offern)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                             <td>{{ $offern->customer_id }}</td>
                            <td>{{ $offern->offer_number }}</td>
                            <td>{{ $offern->offer_date }}</td>
                            <td>{{ $offern->valid_until }}</td>
                            <td>{{ $offern->subtotal }}</td>
                            <td>{{ $offern->gst_amount }}</td>
                            <td>{{ $offern->total_amount }}</td>
                             
                             


                            <td>
                                <form action="{{ route('offers.destroy', $offern->offer_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('offers.download', $offern->offer_id) }}" class="btn btn-primary"> Download </a>
                                

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

                  {{ $offer->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection