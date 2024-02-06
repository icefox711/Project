@extends('layout.main')
@section('content')
<div class="page-container">
    <div class="row">
      <div class="col" style="padding-left: 250px">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container-fluid">
            <h4>{{ auth()->user()->name }}</h4>
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <li class="nav-item float-right">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                    </div>
                    <button type="button" class="btn btn-success col-2 mt-2 ml-3" data-target="#tambahModal" data-toggle="modal">Tambah Data</button>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush text-center" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="col-1">No. </th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $i => $kategori)
                                <tr>
                                    
                                    <td> {{ $i + 1 }} </td>
                                    <td> {{ $kategori->nama_kategori }}</td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$kategori->id}}">Edit
                                        </button> <!--edit-->
                                        <form action="{{ route ('kategori.destroy', $kategori->id ) }}" method="POST" style="display: inline;">
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
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
            aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Edit -->
                        <form action="{{ route('kategori.store') }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                    value="{{ $kategori->nama_kategori }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($kategoris as $kategori)
        <!-- Modal untuk Edit -->
        <div class="modal fade" id="editModal{{ $kategori->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModal{{ $kategori->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal{{ $kategori->id }}Label">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Edit -->
                        <form action="{{ route('kategori.update', $kategori->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                    value="{{ $kategori->nama_kategori }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
@endforeach
@endsection

