@extends('layouts.app')

@section('content')
@if ($farm == null)

    <section class="my-farm my-5 py-5">
        <div class="container">
            <div class="join py-5">
                <div class="container" style="background-image: url('{{ asset('images/join.png') }}')">
                    <div class="text-center">
                        <h2>Maaf Kebun Tidak Ditemukan!</h2>
                        <a href="{{ route('welcome') }}" class="btn btn--primary btn-lg mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@else
    <section class="partner-detail py-5 my-5">
        <div class="container">
            <div class="partner-profile text-center text-md-start">
                <div class="d-md-flex align-items-center">
                    <div class="picture ms-auto me-auto ms-md-0 me-md-0">
                        <img src="/image/{{ $farm->image}}" height="30">
                    </div>
                    <div class="mt-3 mt-md-0 ms-md-4">
                        <h2>{{$farm->name}}</h3>
                        <div class="d-flex align-items-center justify-content-left justify-md-content-start">
                            <div><img src="{{ asset('images/location.png') }}" height="24"></div>
                            
                            <div class="ps-1 pe-2" style="border-right: 1px solid #828282;">Depok</div>
                            <div class="px-2" style="border-right: 1px solid #828282; ">{{$farm->village->subdistrict->name}}</div>
                            <div class="ps-2">{{$farm->village->name}}</div>
                        </div>
                    </div>  
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-5">
                    <div class="map" id="map_dot" style="height: 250px; width: 420px; border-radius: 20px">

                    </div>
                </div>
                <div class="col-lg-5 ms-lg-5">
                    <h4 style="background-color: #86b03c; color: white; border-radius: 10px; padding:8px 15px ; margin-right: 250px;">Farm Code : {{$farm->id}} </h4>
                    <h4 class="mt-3">Luas : {{$farm->luas}}M </h4>
                    <h5 class="mt-3 bold">Tentang {{$farm->name}}</h5>
                    <div class="row mt-3 ">
                        <div class="col-5"><h6>Kualitas Air</h6></div>
                        <div class="col-7"><h6>: {{$farm->kualitas_air}}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5"><h6>Kualitas Udara</h6></div>
                        <div class="col-7"><h6>: {{$farm->kualitas_udara}}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5"><h6>Kualitas Tanah</h6></div>
                        <div class="col-7"><h6>: {{$farm->kualitas_tanah}}</div>
                    </div>                    
                </div>
            </div>

            <div class="row mt-5">
                <h3>Produk yang dihasilkan dari {{$farm->name}}</h5>
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                        <div class="card card-product">
                            <div class="card-header p-0">
                                <img src="/image/products/{{ $product->image}}" class="w-100">
                            </div>
                            <div class="card-body">
                                <h5 class="product-title">{{$product->name}}</h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">{{$product->price}}</h6>
                                        <span>/{{$product->item_unit}}</span>
                                    </div>
                                    <button class="btn btn--primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Beli</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>

        <!-- Modal -->
        <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center mb-3">
                        <p>Tertarik membeli? Hubungi {{$farm->name}} sekarang juga</p>
                        <a href="https://api.whatsapp.com/send?phone=6287874739802" class="btn btn--primary py-3 px-5 mt-3" >
                            <div class="d-flex align-items-center">
                                <div>Hubungkan ke Whatsapp</div>
                                <div class="ms-3"><img src="{{ asset('images/goto.png') }}" height="50"/></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
    
@endsection