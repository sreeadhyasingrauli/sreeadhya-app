@extends('products.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Product
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="part_number" class="col-md-4 col-form-label text-md-end text-start">Part Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('part_number') is-invalid @enderror" id="part_number" name="part_number" value="{{ old('part_number') }}">
                            @error('part_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="part_description" class="col-md-4 col-form-label text-md-end text-start">Part Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('part_description') is-invalid @enderror" id="part_description" name="part_description" value="{{ old('part_description') }}">
                        
                            @error('part_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="make" class="col-md-4 col-form-label text-md-end text-start">Make</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('make') is-invalid @enderror" id="make" name="make" value="{{ old('make') }}">
                            @error('make')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="uom" class="col-md-4 col-form-label text-md-end text-start">Unit Of Measurement</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('uom') is-invalid @enderror" id="uom" name="uom" value="{{ old('uom') }}">
                            @error('uom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="hsn_code" class="col-md-4 col-form-label text-md-end text-start">HSN Code</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('hsn_code') is-invalid @enderror" id="hsn_code" name="hsn_code" value="{{ old('hsn_code') }}">
                            @error('hsn_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gst_rate" class="col-md-4 col-form-label text-md-end text-start">GST Rate (%)</label>
                        <div class="col-md-6">
                            <input type="number" step="0.01" class="form-control @error('gst_rate') is-invalid @enderror" id="gst_rate" name="gst_rate" value="{{ old('gst_rate') }}">
                        
                            @error('gst_rate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection