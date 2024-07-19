@extends('layouts.app')

@section('style')
    <style>
        .search-code{
            position: relative;
        }

        .search-code a{
            position: absolute !important; 
            right: 10px;
            top: 50%;;
            transform: translate(0, -50%);
            height: 80%;
        }
    </style>
@endsection

@section('content')
    
    
    @if(Route::is('hasSubdistrict') || Route::is('hasVillage'))  
        <div class="modal modal-lg fade" id="selectVillages" tabindex="-1" aria-labelledby="selectVillagesLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('postVillage')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body text-center mb-3">
                                        
                                <div class="row">                            
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="villages-select" aria-label="Villages select" name="village_id">
                                                <option>Open this select menu</option>
                                            @foreach ($villages as $v)
                                                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                                            @endforeach    
                                            </select>                      
                                            <label for="label">Pilih Desa</label>                                                        
                                        </div>
                                        </div>                        
                                </div>                                            
                        </div>  
                        <div class="modal-footer">                    
                            <button type="submit" class="btn btn--primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('postSubdistrict')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-center mb-3">
                                    
                            <div class="row">                            
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="variant-select" aria-label="Variant select" name="subdistrict_id">
                                            <option>Open this select menu</option>
                                        @foreach ($subdistricts as $subdistricts)
                                                <option value="{{ $subdistricts->id }}">{{ $subdistricts->name }}</option>
                                        @endforeach    
                                        </select>                      
                                        <label for="label">Pilih Kecamatan</label>                                                        
                                    </div>
                                    </div>                        
                            </div>                                            
                    </div>  
                    <div class="modal-footer">                    
                        <button type="submit" class="btn btn--primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal here --}}

    
    <section class="hero pb-5">
        <div class="container">
            <div class="row justify-content-between">
                
                <div class="col-lg-6 left">
                    <form action="{{route('search-code')}}" method="get">   
                        <h1>Track Farm Code Here!</h1>
                        <div class="input-group mb-3 search-code">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control" id="myText" placeholder="Username" name="farm">
                                <label for="floatingInputGroup1">Input Code</label>
                                <a type="submit" href="#" id="searchLink" class="btn btn--primary"><img src="{{ asset('images/icon/search.png') }}" height="34"></a>                          
                                
                            </div>
                        </div>
                    </form>
                    <div class="desktop-search d-none d-md-block">
                        <div class="search-content">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/location.png') }}" style="margin-left: 10px">
                                
                                    <div class="d-flex align-items-center justify-content-between w-25" style="border-right: 3px solid #eee">
                                        <div href="" class="btn-search-loc">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">
                                                    <h5 class="mb-0 ml-1">Depok</h5>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <img src="{{ asset('images/union.png') }}" class="me-5">
                                    </div>

                                @if(Route::is('hasSubdistrict'))    
                                    <div class="d-flex align-items-center justify-content-between w-25" style="border-right: 3px solid #eee">
                                        <a href="" class="btn-search-loc" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">                                                                                                
                                                    <h5 class="mb-0">{{$subdistrict -> name}}</h5>                                                
                                                </div>
                                            </div>
                                        </a>
                                        <img src="{{ asset('images/union.png') }}" class="me-5">
                                    </div>            
                                    <div class="d-flex align-items-center justify-content-between w-25">
                                        <a href="" class="btn-search-loc" data-bs-toggle="modal" data-bs-target="#selectVillages">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">                                                                                                                
                                                    <p class="mb-0">Select Desa</p>                                                                                                                                                            
                                                </div>
                                            </div>
                                        </a>
                                        <img src="{{ asset('images/union.png') }}" class="me-5">
                                    </div>
                                @elseif(Route::is('hasVillage'))
                                    <div class="d-flex align-items-center justify-content-between w-25" style="border-right: 3px solid #eee">
                                        <a href="" class="btn-search-loc" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">
                                                                                                
                                                    <p class="mb-0">{{$village -> subdistrict -> name}}</p>                                                                                                                                                                                                   
                                                </div>
                                            </div>
                                        </a>
                                        <img src="{{ asset('images/union.png') }}" class="me-5">
                                    </div>                            
                                    <div class="d-flex align-items-center justify-content-between w-25">
                                        <a href="" class="btn-search-loc" data-bs-toggle="modal" data-bs-target="#selectVillages">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">                                                                                                                
                                                    <p class="mb-0">{{$village->name}}</p>                                                                                                                                                            
                                                </div>
                                            </div>
                                        </a>
                                        <img src="{{ asset('images/union.png') }}" class="me-5">
                                    </div>      
                                    
                                @else
                                    <div class="d-flex align-items-center justify-content-between w-25" style="border-right: 3px solid #eee">
                                        <a href="" class="btn-search-loc" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">
                                                                                                
                                                    <p class="mb-0">Select Kecamatan</p>                                                                                                                                                                                                   
                                                </div>
                                            </div>
                                        </a>
                                        <img src="{{ asset('images/union.png') }}" class="me-5">
                                    </div>                            
                                    <div class="d-flex align-items-center justify-content-between w-25">
                                        
                                            <div class="d-flex align-items-center">
                                                <div class="ms-4">                                                                                                                
                                                    <p class="mb-0">Select Desa</p>                                                                                                                                                            
                                                </div>
                                            </div>
                                        
                                        <img src="{{ asset('images/union.png') }}" class="me-5">   
                                    </div>     
                                @endif   
                                
                                <button class="btn btn--primary py-2 px-4 ms-auto btn-search">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/search.png') }}" class="me-3">
                                        <span>Search Area</span>
                                    </div>
                                </button>                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-md-block right" style="background-image: url('{{ asset('images/hero.jpg') }}')">
                </div>
            </div>
        </div>
    </section>
    @include('pages.home._partners')
    <section class="about py-5" id="about">
        <div class="container text-center">
            <h2 class="about-title mb-4">About Tani Pedia</h2>
            <p>Tani Pedia merupakan website penyedia informasi untuk para petani. Salah satu fokus utamanya adalah diharapkan meningkatkan kesejahteraan petani dengan memberikan akses mudah dan cepat kepada informasi yang relevan.</p>
        </div>
    </section>
    <section class="information py-5" id="information">
        <div class="container">
            <h2 class="section-title">Information</h2>
            <div class="row align-items-center justify-content-between mt-4">
                <div class="col-md-6">
                    <div class="card card-image px-3 py-2">
                        <img src="/image/informations/{{ $information_recent->image}}">
                    </div>
                </div>
                <div class="col-md-5 description mt-4 mt-md-0">
                    <small>Recent</small>
                    <h3 class="my-2">{{ $information_recent->title}}</h3>
                    <p>{!! Str::limit($information_recent->content, 170) !!}</p>
                    <p></p>
                    <a href="{{route('information', $information_recent->id)}}" class="btn btn--primary btn-lg">View More</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news py-5">
        <div class="container">
            <div class="row">
                @foreach ($informations as $information)
                    <div class="col-lg-4 mt-3">
                        <div class="card">
                            <div class="card-header p-0">
                                <img src="/image/informations/{{ $information->image}}">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="news-title">{!! Str::limit($information->title, 50) !!}</h4>
                                        <a href="{{ route('information', $information->id) }}" class="btn btn--primary mt-3 float-right">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- @for($i = 0; $i < 8; $i++)
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-3">
                        <div class="card">
                            <div class="card-header p-0">
                                <img src="https://img.sunset02.com/sites/default/files/styles/marquee_large_2x/public/image/2017/05/main/checklist-coleus-m.jpg" class="w-100">
                            </div>
                            <div class="card-body">
                                <h4 class="news-title">{!! Str::limit($information->title, 50) !!}</h4>
                                <a href="{{ route('news.detail', $i) }}" class="btn btn--primary mt-2">View</a>
                            </div>
                        </div>
                    </div>
                @endfor --}}
            </div>
            {{-- <div class="text-center mt-5">
                <a href="" class="btn btn-outline-dark px-4 rounded-pill">View More</a>
            </div> --}}
        </div>
    </section>
    
    @if($farm == null)
        @guest            
            <section class="join py-5">
                <div class="container" style="background-image: url('{{ asset('images/join.png') }}')">
                    <div class="text-center">
                        <h2>Join Now</h2>
                        <h5>Register your account and Becoming our Partners</h5>
                        <a href="{{ route('regist') }}" class="btn btn--primary btn-lg">Register Account</a>
                    </div>
                </div>
            </section>
        @endguest
        @auth
            
        <section class="join py-5">
            <div class="container" style="background-image: url('{{ asset('images/join.png') }}')">
                <div class="text-center">
                    <h2>Daftar Kebun</h2>
                    <h5>Register Farm Right Now!</h5>
                    <a href="{{route("my-farm.register")}}" class="btn btn--primary btn-lg">Register Farm</a>
                </div>
            </div>
        </section>
        @endauth
    @else
        <section class="join py-5">
            <div class="container" style="background-image: url('{{ asset('images/join.png') }}')">
                <div class="text-center">
                    <h2>Lihat Kebun</h2>
                    <h5>Look Up Your Farm Right Now!</h5>
                    <a href="{{ route('my-farm') }}" class="btn btn--primary btn-lg">My Farm</a>
                </div>
            </div>
        </section>    
    @endif
    
@endsection

@section('script')
    <script>
        const btnSearch = document.querySelector('.hero .btn-search')
        const partnersSectiion = document.getElementById('partners')

        btnSearch.addEventListener('click', () => {
            partnersSectiion.classList.add('active')
        })
    </script>
    <script>
        function navigate(link, inputid){
        var url =  window.location.origin + '/partner/' + document.getElementById(inputid).value;
        // window.location.href = url; //navigates to the given url, disabled for demo
        
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchLink = document.getElementById('searchLink');
            var farmInput = document.getElementById('myText');
    
            searchLink.addEventListener('click', function () {
                var farmCode = farmInput.value.trim();
                if (farmCode !== '') {
                    var url = "{{ route('search-code') }}?farm=" + encodeURIComponent(farmCode);
                    window.location.href = url;
                } else {
                    alert('Please enter a farm code.');
                }
            });
        });
    </script>
    
@endsection