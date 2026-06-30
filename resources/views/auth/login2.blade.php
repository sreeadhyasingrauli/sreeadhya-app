@extends('layouts.layout')


@section('content')


<div class="row justify-content-center mt-5">
    <div class="col-md-8">


        <div class="container my-5">
            <div class="border rounded p-4">
                <h5 class="text-center mb-4">Login Form</h5>


                    @if($errors->has('msg'))
                    <div class="alert alert-danger">
                        {{$errors->first('msg')}}
                    </div>
                    @endif


                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                            <input type="email" placeholder="Input email address" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                            <input type="password" placeholder="Input password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
       
    </div>    
</div>
   
@endsection