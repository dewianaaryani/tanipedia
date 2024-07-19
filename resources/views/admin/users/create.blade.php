@extends('admin.layouts.app')
@section('title','Create User')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('users.index')}}">User</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New User</h4></div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Email</label>
                    <input id="email" type="text" class="form-control" name="email" autocomplete="off">
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
                    <input id="password" type="password" class="form-control" name="password" autocomplete="off">
                </div>   
                @error('password')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>                             
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">User Type</label>
                    <select class="form-control selectric" name="type">
                        <option>Open this select menu</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                      </select>          
                </div>   
                @error('type')
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