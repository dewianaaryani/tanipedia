@extends('admin.layouts.app')
@section('title','Edit User')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('users.index')}}">User</a></div>    
    <div class="breadcrumb-item">Edit</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit User</h4></div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" autofocus>
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>   
                @error('email')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    <small>Leave blank if you do not want to change the password.</small>
                </div>   
                @error('password')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="type">User Type</label>                    
                    <select class="form-control select" name="type">                        
                        <option selected>Pick Type</option>
                        <option value="0" {{ $user->type === 'user' ? 'selected' : '' }}>User</option>
                        <option value="1" {{ $user->type === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>          
                </div>   
                @error('type')
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
