@extends('admin.layouts.app')
@section('title','Edit Product')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.products.index')}}">Product</a></div>    
    <div class="breadcrumb-item">Edit</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Product</h4></div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12">
                    <label>Farm</label>
                    <select class="form-control selectric" name="farm_id">
                    <option>Pilih Kebun</option>
                    @foreach ($farms as $farm)
                            <option value="{{ $farm->id }}" {{$farm->id == $product->farm_id ? 'selected="selected"' : ''}}>{{ $farm->name }}</option>
                    @endforeach    
                    </select>                      
                </div>     
                @error('farm_id')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror      
                
                <div class="form-group col-12">
                    <label for="name">Nama Produk</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>   
                @error('name')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-6">
                    <label for="price">Harga</label>
                    <input id="price" type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>   
                @error('price')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-6">
                    <label for="item_unit">Satuan</label>
                    <input id="item_unit" type="text" class="form-control" name="item_unit" value="{{$product->item_unit}}">
                </div>   
                @error('item_unit')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>                    
            <div class="row">
                <div class="col-12">
                    <div class="section-title">Image</div>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>
                    </div>
                    @error('image')
                        <div class="col-12">         
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
            </div>      
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Submit
            </button>
            </div>
        </form>
    </div>
</div>
@stop