@extends('challans.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Challan List</div>
            <div class="card-body">
                <a href="{{ route('challans.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Challan</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Challan Number</th>
                        <th scope="col">Challan Date</th>
                        
                        <th scope="col">Order Number</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Vehicle Number</th>
                        
                        
                                             
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($challans as $challan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{  $challan->customer_id }}</td>
                             <td>{{ $challan->challan_number }}</td>
                            <td>{{ $challan->challan_date }}</td>
                            
                             <td>{{ $challan->order_number }}</td>
                            <td>{{ $challan->order_date }}</td>
                             <td>{{ $challan->vehicle_number }}</td>
                            
                             
                          
                   
                            <td>
                                <form action="{{ route('challans.destroy', $challan->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('challans.pdf', $challan->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Download Challan</a>

                                    

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Challan?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Challan Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>
                  {{ $challans->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection