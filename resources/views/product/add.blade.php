@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group my-1">
                          <label for="name">Name</label>
                          <input type="text" name="name"  class="form-control" id="name" placeholder="Enter name">
                        </div>

                        <div class="form-group my-1">
                          <label for="purchase_price">Purchase Price</label>
                          <input type="number" name="purchase_price"  step="0.01" class="form-control" placeholder="Enter Purchase Price">
                        </div>
                        
                        <div class="form-group my-1">
                            <label for="sale_price">Sale Price</label>
                            <input type="number" name="sale_price"  step="0.01" class="form-control" placeholder="Enter Sale Price">
                        </div>

                        <div class="form-group my-1">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter Stock">
                        </div>
                    
                        <div class="form-group my-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary col-6">Submit</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
