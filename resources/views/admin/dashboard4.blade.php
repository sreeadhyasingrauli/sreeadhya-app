@extends('layouts.layout')


@section('content')




<div class="row justify-content-center mt-5">
    <div class="col-md-8">


        <div class="container my-5">
            <div class="border rounded p-4">
                <h3 class="text-center mb-4">Admin Home Page</h3>
                   
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif    
            </div>
        </div>
    </div>    
</div>
   
@endsection
