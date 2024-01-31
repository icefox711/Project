   @extends('layout.main')
   @section('content')
       <div class="row mb-3">
           <!-- Container Fluid-->
           <div class="container-fluid" id="container-wrapper">
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                   <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="./">Home</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                   </ol>
               </div>
           </div>

           {{-- content --}}
           <div class="main-panel">
               <div class="content-wrapper">
                   <div class="row">
                       <div class="card ml-5">
                           <h4 class="font-weight-bold ml-3 mt-3">Jajanan</h4>
                           <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                               <div class="row">
                                   <div class="col-lg-12 d-flex flex-row">
                                       <div class="row flex-grow">
                                           <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">

                                               {{-- Form --}}
                                               <div class="card-body d-flex flex-row gap-3 flex-wrap col-12">
                                                   @foreach ($produks as $key => $produk)
                                                       <div class="card" style="width: 17rem;">
                                                           <td class="text-center">
                                                               <img src={{ Asset('storage/produk/' . $produk->foto) }}
                                                                   alt="not found"
                                                                   style="width:100%; height:15rem; object-fit:cover;" />
                                                           </td>
                                                           <div class="card-body">
                                                               <h5 class="card-title text-center">
                                                                   {{ $produk->nama_produk }}
                                                               </h5>
                                                               <p class="card-text">
                                                                   <td>Rp.
                                                                       {{ number_format($produk->harga, 0, ',', '.') }},00
                                                                   </td>
                                                               </p>
                                                               <p class="card-text">
                                                                   <td>Deskripsi: {{ $produk->desc }}</td>
                                                               </p>
                                                               <p class="card-text">
                                                                   <td>Stok: {{ $produk->stok }}</td>
                                                               </p>
                                                               <button type="button" class="btn btn-primary btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target="#addToCart-{{ $produk->id }}">beli
                                                               </button>
                                                           </div>
                                                       </div>
                                                   @endforeach
                                               </div>
                                           </div>
                                           {{-- end --}}

                                           {{-- Modal AddToCart --}}
                                           @foreach ($produks as $produk)
                                               <div class="modal fade" id="addToCart-{{ $produk->id }}" tabindex="-1"
                                                   role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true">
                                                   <div class="modal-dialog modal-lg">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h4 class="modal-title" id="addToCartModalLabel">Tambah ke
                                                                   Keranjang
                                                               </h4>
                                                               <button type="button" class="close" data-dismiss="modal"
                                                                   aria-label="Close">
                                                                   <span>&times;</span>
                                                               </button>
                                                           </div>
                                                             <form action="{{ route('addToCart', $produk->id) }}" method="post"> 
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_user"
                                                                value="{{ auth()->user()->id }}">
                                                            <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                                            <input type="hidden" name="harga" value="{{ $produk->harga }}">
                                                            <div class="form-group">
                                                                <label for="jumlah_produk">Qty</label>
                                                                <input type="number" id="jumlah_produk" class="form-control"
                                                                    min="1" max="{{ $produk->stok }}"
                                                                    name="jumlah_produk" value="1" required>
                                                            </div>
    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Batal</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ms-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Tambah</span>
                                                            </button>
                                                        </div>
                                                    </form> 
                                                       </div>
                                                   </div>
                                               </div>
                                           @endforeach
                                           {{-- end --}}
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       </div>
       </div>
       </div>
       <!-- main-panel ends -->
       </div>      

       <!-- Modal Logout -->
       <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <p>Are you sure you want to logout?</p>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                       <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                   </div>
               </div>
           </div>
       </div>

       </div>
       <!---Container Fluid-->
       </div>
   @endsection
