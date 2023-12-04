<!-- dalam file index.blade.php -->

@extends('layouts.main')

@section('konten')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Products</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    Add Product
                </button>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->image }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal{{ $product->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sertakan modal create -->
    @include('products.create')

    <!-- Sertakan modal edit dan delete untuk setiap produk -->
    @foreach($products as $product)
        @include('products.edit', ['product' => $product])
        @include('products.delete', ['product' => $product])
    @endforeach

@endsection
