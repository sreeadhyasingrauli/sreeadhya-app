@extends('commercial-offers.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Commercial Offer List</div>
            <div class="card-body">
                <a href="{{ route('commercial-offers.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Commercial Offer</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Offer Number</th>
                        <th scope="col">Offer Date</th>
                        <th scope="col">Enquiry Number</th>
                        <th scope="col">Enquiry Date</th>
                        <th scope="col">Validity</th>
                        <th scope="col">Payment</th>
                        <th scope="col">GST</th>
                        <th scope="col">Delivery</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Basis Of Price</th> 
                        <th scope="col">Warranty/Guarantee</th> 
                         <th scope="col">Other Terms</th> 

                 
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($commercialoffers as $offer)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                             <td>{{ $offer->customer_id }}</td>
                            <td>{{ $offer->offer_number }}</td>
                            <td>{{ $offer->offer_date }}</td>
                            <td>{{ $offer->enquiry_number }}</td>
                            <td>{{ $offer->enquiry_date }}</td>
                            <td>{{ $offer->validity }}</td>
                            <td>{{ $offer->payment_terms }}</td>
                            <td>{{ $offer->gst_terms }}</td>
                            <td>{{ $offer->delivery_terms }}</td>
                            <td>{{ $offer->discount }}</td>
                            <td>{{ $offer->pricebasis_terms }}</td>
                            <td>{{ $offer->guarantee_terms }}</td>
                            <td>{{ $offer->other_terms }}</td> 
                                                         <td>
                                <form action="{{ route('commercial-offers.destroy', $offer->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('commercial-offers.download', $offer->id) }}" class="btn btn-primary"> Download </a>
                                

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Offer?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Commerial Offer Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $commercialoffers->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection