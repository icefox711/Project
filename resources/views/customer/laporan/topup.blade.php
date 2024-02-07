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
                                        <h4 class="header-title">Riwayat Top Up</h4>
                                        <div class="data-tables">
                                            <table id="topup-table" class="table table-bordered table-hover">
                                                <thead class="bg-light text-capitalize">
                                                    <tr>
                                                        <th class="col-1">No.</th>
                                                        <th>Tanggal</th>
                                                        <th>Nominal</th>
                                                        <th>Kode Unik</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($topups as $i => $topup)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $topup->created_at }}</td>
                                                            <td>Rp.{{ number_format($topup->nominal, 0, ',', '.') }},00</td>
                                                            <td>{{ $topup->kode_unik }}</td>
                                                            <td>{{ $topup->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button onclick="printTopupHistory()" class="btn btn-primary mt-3 float-right">Cetak</button>
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
        function printTopupHistory() {
            // Mencetak tabel menggunakan JavaScript
            var printContents = document.getElementById('topup-table').outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection