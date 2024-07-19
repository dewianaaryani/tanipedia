@extends('admin.layouts.app')
@section("headScript")
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection
@section('title','Edit Information')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.informations.index')}}">User</a></div>    
    <div class="breadcrumb-item">Edit Information</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Information</h4></div>
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
        <form method="POST" action="{{route('admin.informations.update', $information->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Judul</label>
                    <input id="title" type="text" class="form-control" name="title" autofocus value="{{$information -> title}}">
                </div>   
                @error('title')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label> Content </label>
                    <textarea class="form-control" id="body" placeholder="" name="content">{{$information -> content}}"</textarea>
                </div>   
                @error('content')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>             
            <div class="row">
                <div class="form-group col-12">
                    <label for="source">Sumber</label>
                    <input id="source" type="text" class="form-control" name="source" value="{{$information -> source}}">
                </div>   
                @error('source')
                    <div class="col-12">         
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
@section("bodyScript")
<script>
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
    console.error( error );
    } );
</script>
@endsection