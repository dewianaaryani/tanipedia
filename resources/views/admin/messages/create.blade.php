@extends('admin.layouts.app')
@section('title','Create Message')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.messages.index')}}">Message</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New Message</h4></div>
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
        <form method="POST" action="{{route('admin.messages.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">   
                
                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" autofocus>
                </div>   
                @error('email')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            <div class="row">   
                
                <div class="form-group col-12">
                    <label for="message">Pesan</label>
                    <input id="message" type="text" class="form-control" name="message">
                </div>   
                @error('message')
                    <div class="col-6">         
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