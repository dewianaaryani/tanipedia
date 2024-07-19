@extends('admin.layouts.app')
@section('title','Farm')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Farm Table</h4>
                    <div class="card-header-form">
                      <form action="{{ route('admin.farms.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search" value="{{ request()->input('query') }}">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                      </form>
                    </div> 
                    <a href="{{ route('admin.farms.create') }}" class="btn btn-primary">Add</a>          
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
                          <th>Nama Farm</th>
                          <th>Kode Pos</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                        @foreach($farms as $farm)
                        <tr>
                          <td>{{ ++$i }}</td>                          
                          <td>{{ $farm -> name}}</td>
                          <td>{{ $farm -> location}}</td>
                          <td><img src="/image/{{ $farm->image}}" alt="" width="100px"></td>                                                                                              
                          <td>
                            <form action="{{route('admin.farms.destroy', $farm->id)}}" method="post">
                              <a href="{{route('admin.farms.edit', $farm->id)}}" class="btn btn-warning">Edit</a>                                                                
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
              {{ $farms->links() }} 
            </div>
@stop