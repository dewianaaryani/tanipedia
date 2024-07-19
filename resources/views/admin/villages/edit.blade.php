@extends('admin.layouts.app')
@section("headScript")
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection
@section('title','Edit Desa')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.villages.index')}}">Desa</a></div>    
    <div class="breadcrumb-item">Edit Desa</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Desa</h4></div>
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
        <form method="POST" action="{{route('admin.villages.update', $village->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Kode Pos</label>
                    <input id="title" type="text" class="form-control" name="post_code" autofocus value="{{$village -> post_code}}">
                </div>   
                @error('post_code')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Nama</label>
                    <input id="title" type="text" class="form-control" name="name"  value="{{$village -> name}}">
                </div>   
                @error('title')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>       
            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Kecamatan</label>
                    <select class="form-control selectric" name="subdistrict_id" value="{{ $village -> subdistrict_id }}">
                        <option>Buka pilihan menu</option>
                        @foreach ($subdistricts as $subdistrict)
                            <option value="{{ $subdistrict->id }}" {{$subdistrict->id == $village->subdistrict_id ? 'selected="selected"' : ''}}>{{$subdistrict->name}}</option>
                        @endforeach
                    </select>
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

