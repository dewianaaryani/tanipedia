@extends('admin.layouts.app')
@section('title','Create Product')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.products.index')}}">User</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New Product</h4></div>
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
        <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label>Farm</label>
                    <select class="form-control selectric" name="farm_id">
                    <option>Open this select menu</option>
                    @foreach ($farms as $farm)
                            <option value="{{ $farm->id }}">{{ $farm->name }}</option>
                    @endforeach    
                    </select>                      
                </div>     
                @error('farm_id')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror      
                
                <div class="form-group col-12">
                    <label for="name">Product Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                </div>   
                @error('name')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-6">
                    <label for="price">Price</label>
                    <input id="price" type="text" class="form-control" name="price">
                </div>   
                @error('price')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-6">
                    <label for="item_unit">Satuan</label>
                    <input id="item_unit" type="text" class="form-control" name="item_unit">
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