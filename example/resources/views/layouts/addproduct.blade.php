@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Register</div>
                    
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">
                                            @csrf
                    
                                            <div class="row mb-3">
                                                <label  class="col-md-4 col-form-label text-md-end">Product Name</label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autofocus>
                    
                                                    @error('product_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label  class="col-md-4 col-form-label text-md-end">Description</label>
                    
                                                <div class="col-md-6">
                                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autofocus>
                    
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label  class="col-md-4 col-form-label text-md-end">Price</label>
                    
                                                <div class="col-md-6">
                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autofocus>
                                                   
                                                    @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label  class="col-md-4 col-form-label text-md-end">Category</label>
                    
                                                <div class="col-md-6">
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category" id="category" value="{{ old('category') }}" required autofocus>
                                                        <option selected>Open this select menu</option>
                                                        @foreach ($data as $categorydata)
                                                            <option value="{{$categorydata->id}}">{{$categorydata->category_name}}</option>
                                                        @endforeach
                                                       
                                                      </select>
                                                    @error('category')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label  class="col-md-4 col-form-label text-md-end">Image</label>
                    
                                                <div class="col-md-6">
                                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autofocus>
                                                   
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                           
                    
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Addproduct
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection