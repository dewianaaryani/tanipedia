
@if(Route::is('hasVillage'))    
    <section id="partners" class="partners py-5">
        <div class="container">
            <div class="w-100 d-flex justify-content-center">
                <div id="map" style="height: 300px; width: 50%; border: 1px solid #86b03c; border-radius: 20px;"></div>
            </div>
            <div class="text-center mt-5">
                <h2 class="text--primary">Mitra Kami Di {{$village->name}}</h2>
            </div>
            <div class="row mt-4 align-items-center justify-content-center">
                @foreach ($farms as $farm)
                    <div class="col-md-6 col-lg-3 mt-3">
                        <a href="{{ route('partnerDetail', $farm->id) }}">
                            <div class="card partner-card">
                                <div class="card-body">
                                    <img src="/image/{{ $farm->image}}">
                                    <h4 class="farm-name">{{ $farm -> name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{-- @for($i = 0; $i < 4; $i++)
                    <div class="col-md-6 col-lg-3 mt-3">
                        <a href="{{ route('partner.index', 1) }}">
                            <div class="card partner-card">
                                <div class="card-body">
                                    <img src="{{ asset('images/hero.jpg') }}">
                                    <h4 class="farm-name">Handoko Farm</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor --}}
            </div>
        </div>
    </section>
    
@else
<section id="partners" class="partners">
    <div class="row">
        <div class="col-12" style="padding: 10px">
            <div class ="alert alert-danger" role="alert" style="background-color: #F24C3D; ">
                Silahkan Select Kecamatan dan Select Desa
            </div>
        </div>
    </div>
</section>
@endif