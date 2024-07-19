@extends('layouts.app')

@section('content')
    <section class="farm-register my-5 pt-5">
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
        <form method="POST" action="{{route('my-farm.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <h2>Buat data kebun</h2>
                <div class="row mt-4">
                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama-kebun" placeholder="." name="name">
                            <label for="nama-kebun">Nama Kebun</label>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="luas-kebun" placeholder="." name="luas">
                            <label for="luas-kebun">Luas Kebun (meter)</label>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="contact" placeholder="+62000000" name="contact">
                            <label for="contact">Whatsapp Number</label>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="latitude" placeholder="." name="lt">
                            <label for="latitude">Latitude</label>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="longtitude" placeholder="." name="ld">
                            <label for="longtitude">Longtitude</label>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <select class="form-select " name="location">
                                <option>Open this select menu</option>
                                @foreach ($locations as $location)
                                        <option value="{{ $location->post_code }}">{{ $location->post_code }} - {{ $location->name}}</option>
                                @endforeach   
                            </select>
                            <label for="post_code">Select Postal Code</label>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <select class="form-select " name="kualitas_air">
                                <option>Open this select menu</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                            <label for="post_code">Select Kualitas Air</label>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <select class="form-select " name="kualitas_tanah">
                                <option>Open this select menu</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                            <label for="post_code">Select Kualitas Tanah</label>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="form-floating">
                            <select class="form-select " name="kualitas_udara">
                                <option>Open this select menu</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Kurang">Kurang</option> 
                            </select>
                            <label for="post_code">Select Kualitas Udara</label>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <div class="row">
                            <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control form-control-file" id="gambar" name="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block">
                    <button type="submit" class="btn btn--primary w-100 py-3 mt-3">Submit</button>
                    {{-- <a href="{{ route('my-farm.data', ['registered' => 'true']) }}" class="btn btn--primary w-100 py-3 mt-3">Submit</a> --}}
                </div>
            </div>
        </form>
    </section>
@endsection
