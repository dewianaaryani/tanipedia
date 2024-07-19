<div class="partner-detail pb-5">
    <div class="partner-profile text-center text-md-start">
        <div class="d-md-flex align-items-center justify-content-between">
            <div class="d-md-flex align-items-center">
                <div class="picture ms-auto me-auto ms-md-0 me-md-0">
                    <img src="/image/{{$farm->image}}" height="30">
                </div>
                <div class="mt-3 mt-md-0 ms-md-4">
                    <h2>{{$farm->name}}</h3>
                    <div class="d-flex align-items-center justify-content-center justify-md-content-start">
                        <div><img src="{{ asset('images/location.png') }}" height="24"></div>
                        <div class="ps-1 pe-2" style="border-right: 1px solid #828282">Depok</div>
                        <div class="px-2" style="border-right: 1px solid #828282">{{$farm->village->subdistrict->name}}</div>
                        <div class="ps-2">{{$farm->village->name}}</div>
                    </div>
                </div>  
            </div>
            {{-- <a href="" class="btn btn--primary py-2 px-4 mt-3 mt-md-0">Edit Form</a> --}}
        </div>
    </div>

    <div class="row align-items-center mt-5">
        <div class="col-lg-5"> 
            <div id="map-farm" style="height: 270px; width: 100%; border: none;border-radius: 24px"></div> 
        </div>
    
        <div class="col-lg-5 ms-lg-5">
            <h4>Luas {{$farm->luas}} M</h4>
            <h5 class="mt-3">Kondisi di area {{$farm->name}}</h5>
            <div class="row mt-3">
                <div class="col-7"><h6>Kualitas Air</h6></div>
                <div class="col-5"><h6>: {{$farm->kualitas_air}}</div>
            </div>
            <div class="row mt-2">
                <div class="col-7"><h6>Kualitas Udara</h6></div>
                <div class="col-5"><h6>: {{$farm->kualitas_udara}}</div>
            </div>
            <div class="row mt-2">
                <div class="col-7"><h6>Kualitas Tanah</h6></div>
                <div class="col-5"><h6>: {{$farm->kualitas_tanah}}</div>
            </div>            
        </div>
    </div>
</div>

<div class="partner-detail row mt-5">
    <div class="d-md-flex align-items-center justify-content-between mb-3">
        <h3>Produk yang dihasilkan dari {{$farm->name}}</h5>
        <button href="" class="btn btn--primary py-2 px-4" data-bs-toggle="modal" data-bs-target="#addProduckModal">Tambah Produk Baru</button>
    </div>
    @if($products->isEmpty())
        <div class="join py-5">
            <div class="container" style="background-image: url('{{ asset('images/join.png') }}')">
                <div class="text-center">
                    <h2>Data Produkmu belum ada</h2>
                    <h5>Tambahkan produkmu sekarang!</h5>
                    <button class="btn btn--primary btn-lg" data-bs-toggle="modal" data-bs-target="#addProduckModal">Tambah Produk</button>
                </div>
            </div>
        </div>
    @else
    @foreach ($farm->products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
            <div class="card card-product">
                <div class="card-header p-0 position-relative">
                    <img src="/image/products/{{$product->image}}" class="w-100">
                    <form action="{{ route('farms.products.destroy', ['farmId' => $farm->id, 'productId' => $product->id]) }}" method="POST" class="position-absolute top-0 end-0 m-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <div class="card-body">
                    <h5 class="product-title">{{$product->name}}</h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-1">Rp. {{$product->price}}</h6>
                            <span>/{{$product->item_unit}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
             
    @endif
</div>
<form method="POST" action="{{route('my-farm.storeProduct')}}" enctype="multipart/form-data">
    @csrf
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
    <div class="modal modal-lg fade" id="addProduckModal" tabindex="-1" aria-labelledby="addProduckModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none">
            <h1 class="modal-title fs-5" id="addProduckModalLabel">Tambah Produk</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="mb-3 row">
                        <label for="nama-produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama-produk" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="harga" name="price">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="satuan" name="item_unit">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control form-control-file" id="gambar" name="image">
                        </div>
                    </div>
                    <div class="text-center my-5">
                        <button type="submit" class="btn btn--primary py-2 px-4">Submit</button>                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

</form>
@if (session('success'))
    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--primary py-2 px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to show the modal -->
    
@endif