@extends('layout.main')
@section('content')
<div class="page-ycontainer">
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
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Permintaan Top Up</h4>
                        <div class="data-tables">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>No.</th>
                                        <th>Customer</th>
                                        <th>Rekening</th>
                                        <th>Nominal</th>
                                        <th>Kode Unik</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topups as $i => $topup)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $topup->wallet->user->name }}</td>
                                            <td>{{ $topup->rekening }}</td>
                                            <td>Rp. {{ number_format($topup->nominal, 0, ',', '.') }},00</td>
                                            <td>{{ $topup->kode_unik }}</td>
                                            <td>{{ $topup->status }}</td>
                                            <td class="col-2">
                                                @if ($topup->status === 'menunggu')
                                                    <form action="{{ route('konfirmasi.topup', $topup->id) }}"
                                                        method="post" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm">Konfirmasi</button>
                                                    </form>

                                                    <form action="{{ route('tolak.topup', $topup->id) }}"
                                                        method="post" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Tolak</button>
                                                    </form>
                                                @elseif($topup->status === 'dikonfirmasi')
                                                    <button type="submit"
                                                        class="btn btn-success btn-sm col-12">{{ $topup->status }}</button>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm col-12">{{ $topup->status }}</button>
                                                @endif
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
      </div>
    </div>
  </div>
@endsection