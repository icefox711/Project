@extends('layout.main')

@section('content')
    <!-- main content area start -->
    <div class="content-wrapper">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="col-lg-12 d-flex flex-row">
                <div class="main-content-inner">
                    <!-- sales report area start -->
                    <div class="sales-report-area sales-style-two">
                        <div class="row">
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Riwayat Transaksi</h4>
                                        <div class="data-tables">
                                            <table id="transaction-table" class="table table-bordered table-hover">
                                                <thead class="bg-light text-capitalize">
                                                    <tr>
                                                        <th class="col-1">No.</th>
                                                        <th>Produk</th>
                                                        <th>Harga</th>
                                                        <th>Kuantitas</th>
                                                        <th>Tanggal</th>
                                                        <th>Total harga</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaksis as $i => $transaksi)
                                                        <tr class="text-center">
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $transaksi->produk->nama_produk }}</td>
                                                            <td>{{ $transaksi->harga }}</td>
                                                            <td>{{ $transaksi->kuantitas }}</td>
                                                            <td>{{ $transaksi->tgl_transaksi }}</td>
                                                            <td>Rp.{{ number_format($transaksi->total_harga, 0, ',', '.') }},00</td>
                                                            <td>{{ $transaksi->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button onclick="printTransactionHistory()" class="btn btn-primary mt-3">Cetak</button>
                                    </div>
                                </div>
                            </div>
                            <!-- data table end -->
                        </div>
                    </div>
                    <!-- sales report area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->

    <script>
        function printTransactionHistory() {
            // Mencetak tabel menggunakan JavaScript
            var printContents = document.getElementById('transaction-table').outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection