@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">Products
                    <a href="{{ route('product.create') }}" class=" btn btn-primary col-2 m-2">Add</a>
                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="thead-dark">

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Purchase Price</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Actions</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>

                                    <div class="d-flex">

                                        <a href="{{ route('product.edit',$product) }}" class="button btn btn-primary me-1">Edit</a>

                                        <form action="{{ route('product.destroy',$product) }}" method="post" class="m-0 p-0 b-0">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="button btn btn-danger">Delete</button>
                                        </form>
                                    </div>

                                </td>
                              </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                   
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
