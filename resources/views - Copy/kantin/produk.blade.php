@extends('layout.main')
@section('content')

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                    </div>
                    <button type="button" class="btn btn-danger col-2" data-target="#tambahModal" data-toggle="modal">Tambah Data</button>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush text-center" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Nama produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Foto</th>
                                    <th>Desc</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $i => $produk)
                                    <tr>
                                        
                                        <td> {{ $i + 1 }} </td>
                                        <td> {{ $produk->nama_produk }}</td>
                                        <td>{{$produk->harga}}</td>
                                        <td>{{$produk->stok}}</td>
                                        <td><img src="{{ asset('storage/produk/' . $produk->foto) }}" alt="" width="100px"></td>
                                        <td>{{$produk->desc}}</td>   
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$produk->id}}">Edit
                                            </button> <!--edit-->
                                            <form action="{{ route ('produk.destroy', $produk->id ) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ">Hapus Data</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir Tambah -->
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_produk">Nama produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        <div class="form-gorup mb-3" >
                            <label for="nama_kategori">Kategori</label>
                            <select class="form-control" name="id_kategori">
                                @foreach ($kategoris as $kategori)
                                    <option  value="{{ $kategori->id }}">
                                        {{ $kategori->nama_kategori}}
                                    </option>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" class="form-control" id="desc" name="desc" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($produks as $produk)
    <!-- Modal untuk Edit -->
    <div class="modal fade" id="editModal{{ $produk->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModal{{ $produk->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal{{ $produk->id }}Label">Edit produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir Edit -->
                    <form action="{{ route('produk.update', $produk->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_produk">Nama produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="{{ $produk->nama_produk }}">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="{{ $produk->harga }} ">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok"
                                value="{{ $produk->stok}} " >
                            <label for="id_kategori">Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $produk->id_kategori === $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <label for="desc">Desc</label>
                            <input type="text" name="desc" class="form-control" id="desc" value="{{ $produk->desc }}">
                            <label for="foto">Foto</label>
                            <input type="file" id="foto" name="foto">
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

