@extends('layouts.app')

@section('content')
<style>
    .image{
        height:150px;
        width: 200px;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Products</h1>
                <form method="post" action="{{ route('search') }}">
                    @csrf
                    <div class="input-group mb-3">
                        
                        <input type="text" class="form-control" name="search" aria-label="Text input with checkbox">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                              <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                          </div>
                      </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productdata as $product)
                            <tr>
                                
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td ><img class="image" src='{{URL::asset("asset/$product->image")}}'/></td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                       
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
