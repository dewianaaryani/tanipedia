@extends('admin.layouts.app')

@section('title', 'Product')

@section('main-content')
<div class="section-header">
    <h1>Product Table</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></div>
        <div class="breadcrumb-item active">Product</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Product List</h4>
            <div class="card-header-form">
                <form action="{{ route('admin.products.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search" value="{{ request()->input('query') }}">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-header-action">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ $message }}
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Farm</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->farm ? $product->farm->name : 'No Name' }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img src="/image/products/{{ $product->image }}" alt="" width="100px"></td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
