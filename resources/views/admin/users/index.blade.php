@extends('admin.layouts.app')
@section('title','Users')
@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Users Table</h4>
        <div class="card-header-form">
          <form action="{{ route('users.index') }}" method="GET">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->query('search') }}">
              <div class="input-group-btn">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add</a>          
      </div>
      <div class="card-body p-0">
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
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Type</th>                        
              <th>Action</th>
            </tr>
            @foreach($users as $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>                                                                                              
                <td>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>                                                            
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>      
            @endforeach                                                                
          </table>                                                                 
        </div>
      </div>
    </div>
    {{ $users->links() }}   
  </div>
@stop
