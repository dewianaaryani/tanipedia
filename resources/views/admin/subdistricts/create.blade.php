@extends('admin.layouts.app')
@section("headScript")
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection
@section('title','Create Subdistrict')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.subdistricts.index')}}">Subdistrict</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New Kecamatan</h4></div>
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
    <div class="card-body">
        <form method="POST" action="{{route('admin.subdistricts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Name</label>
                    <input id="title" type="text" class="form-control" name="name" autofocus>
                </div>   
                @error('title')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
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
