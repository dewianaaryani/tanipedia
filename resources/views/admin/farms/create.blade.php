@extends('admin.layouts.app')
@section('title','Create Farm')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.farms.index')}}">User</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New Farm</h4></div>
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
        <form method="POST" action="{{route('admin.farms.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label>Pemilik</label>
                    <select class="form-control selectric" name="user_id">
                    <option>Buka Menu Pilihan</option>
                    @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                    <input id="name" type="text" class="form-control" name="name" autofocus>
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
                    <input id="lt" type="number" class="form-control" name="lt">
                </div>   
                @error('lt')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-4">
                    <label for="password">Latitude</label>
                    <input id="ld" type="number" class="form-control" name="ld">
                </div>   
                @error('ld')
                    <div class="col-4">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-4">
                    <label>Kode Pos</label>
                    <select class="form-control selectric" name="location">
                    <option>Buka menu pilihan</option>
                    @foreach ($locations as $location)
                            <option value="{{ $location->post_code }}">{{ $location->post_code }} - {{ $location->name}}</option>
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
                    <input id="luas" type="number" class="form-control" name="luas">
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
                        <option>Buka menu pilihan</option>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Kurang">Kurang</option>
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
                        <option>Buka menu pilihan</option>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Kurang">Kurang</option>
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
                        <option>Buka menu pilihan</option>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Kurang">Kurang</option>
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
                    <input id="contact" type="number" class="form-control" name="contact" placeholder="628....">
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