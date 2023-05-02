@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                   <div class="row">
                        <div class="col-lg-6"><center><b><a href="{{route('addproduct')}}">Add Product</a></b></center></div>
                        <div class="col-lg-6"><center><b><a href="{{route('showproduct')}}">Show Product</a></b></center></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection