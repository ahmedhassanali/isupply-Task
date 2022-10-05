@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">update Product</div>

                <div class="card-body">
                    <form action="{{ route('product.update' , $product) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group my-1">
                            <input type="hidden" name="id" class="form-control" id="id" value={{ $product->id }} >
                        </div>

                        <div class="form-group my-1">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value={{ $product->name }} placeholder="Enter name">
                        </div>

                        <div class="form-group my-1">
                            <label for="purchase_price">Purchase Price</label>
                            <input type="number"  step="0.01" name="purchase_price" class="form-control" value={{ $product->purchase_price }} placeholder="Enter Purchase Price">
                        </div>
                        
                        <div class="form-group my-1">
                            <label for="sale_price">Sale Price</label>
                            <input type="number"  step="0.01" name="sale_price" class="form-control" value={{ $product->sale_price }} placeholder="Enter Sale Price">
                        </div>

                        <div class="form-group my-1">
                            <label for="stock">Stock</label>
                            <input type="number"  step="0.01" name="stock" class="form-control" value={{ $product->stock }} id="stock" placeholder="Enter Stock">
                        </div>
                    
                        <div class="form-group my-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
