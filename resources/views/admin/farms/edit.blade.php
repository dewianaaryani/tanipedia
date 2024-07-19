@extends('admin.layouts.app')
@section('title','Edit Farm')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.farms.index')}}">Farm</a></div>    
    <div class="breadcrumb-item">Edit</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Farm</h4></div>
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
        <form method="POST" action="{{route('admin.farms.update', $farm->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label>Pemilik</label>
                    <select class="form-control selectric" name="user_id">
                        <option>Open this select menu</option>
                        @foreach ($users as $user)
                         <option value="{{ $user->id }}" {{$user->id == $farm->user_id ? 'selected="selected"' : ''}}>{{ $user->name }}</option>
                        @endforeach      
                    </select>               
                </div>     
                @error('user_id')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror      
                
                <div class="form-group col-6">
                    <label for="name">Nama Kebun</label>
                    <input id="name" type="text" class="form-control" value="{{ $farm -> name }}" name="name" autofocus>
                </div>   
                @error('name')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-4">
                    <label for="lt">Longitude</label>
                    <input id="lt" type="text" class="form-control" name="lt" value="{{ $farm -> lt }}">
                </div>   
                @error('lt')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-4">
                    <label for="password">Latitude</label>
                    <input id="ld" type="text" class="form-control" name="ld" value="{{ $farm -> ld }}">
                </div>   
                @error('ld')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-4">
                    <label>Kode Pos</label>
                    <select class="form-control selectric" name="location" value="{{ $farm -> name }}">
                    <option>Open this select menu</option>
                    @foreach ($locations as $location)
                         <option value="{{ $location->post_code }}" {{$location->post_code == $farm->location ? 'selected="selected"' : ''}}>{{ $location->post_code }} - {{$location->name}}</option>
                    @endforeach   
                    </select>       
                </div>   
                @error('location')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="luas">Luas Farm</label>
                    <input id="luas" type="text" class="form-control" name="luas" value="{{ $farm -> luas }}">
                </div>   
                @error('luas')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>                             
            <div class="row">
                <div class="form-group col-4">
                    <label for="name">Kualitas Air</label>
                    <select class="form-control selectric" name="kualitas_air">
                        <option>Open this select menu</option>
                            <option value="Sangat Baik" {{($farm->kualitas_air === 'Sangat Baik') ? 'Selected' : ''}}>Sangat Baik</option>
                            <option value="Baik" {{($farm->kualitas_air === 'Baik') ? 'Selected' : ''}}>Baik</option>
                            <option value="Kurang" {{($farm->kualitas_air === 'Kurang') ? 'Selected' : ''}}>Kurang</option>
                      </select>          
                </div>   
                @error('kualitas_air')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-4">
                    <label for="name">Kualitas Tanah</label>
                    <select class="form-control selectric" name="kualitas_tanah">
                        <option>Open this select menu</option>
                        <option value="Sangat Baik" {{($farm->kualitas_tanah === 'Sangat Baik') ? 'Selected' : ''}}>Sangat Baik</option>
                        <option value="Baik" {{($farm->kualitas_tanah === 'Baik') ? 'Selected' : ''}}>Baik</option>
                        <option value="Kurang" {{($farm->kualitas_tanah === 'Kurang') ? 'Selected' : ''}}>Kurang</option>
                      </select>          
                </div>   
                @error('kualitas_tanah')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-4">
                    <label for="name">Kualitas Udara</label>
                    <select class="form-control selectric" name="kualitas_udara">
                        <option>Open this select menu</option>
                        <option value="Sangat Baik" {{($farm->kualitas_udara === 'Sangat Baik') ? 'Selected' : ''}}>Sangat Baik</option>
                        <option value="Baik" {{($farm->kualitas_udara === 'Baik') ? 'Selected' : ''}}>Baik</option>
                        <option value="Kurang" {{($farm->kualitas_udara === 'Kurang') ? 'Selected' : ''}}>Kurang</option>
                      </select>          
                </div>   
                @error('kualitas_udara')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>     
            <div class="row">
                <div class="form-group col-12">
                    <label for="contact">Kontak Whatsapp</label>
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ $farm -> contact }}">
                </div>   
                @error('contact')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>             
            <div class="row">
                <div class="col-12">
                    <div class="section-title">Image</div>
                    <img src="/image/{{ $farm->image }}" width="300px" class="mb-2">   
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose New Image</label>
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