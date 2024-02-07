@extends('layout.main')

@section('content')
    <!-- main content area start -->
    <div class="content-wrapper">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="col-lg-12 d-flex flex-row">
                <div class="main-content-inner">
                    <!-- sales report area start -->
                    <div class="sales-report-area sales-style-two">
                        <div class="container">
                        <div class="row">
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Riwayat Tarik Tunai</h4>
                                        <div class="data-tables">
                                            <table id="withdrawal-table" class="table table-bordered table-hover">
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
                                                    @foreach ($withdrawals as $i => $withdrawal)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $withdrawal->created_at }}</td>
                                                            <td>Rp.{{ number_format($withdrawal->nominal, 0, ',', '.') }},00</td>
                                                            <td>{{ $withdrawal->kode_unik }}</td>
                                                            <td>{{ $withdrawal->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button onclick="printWithdrawalHistory()" class="btn btn-primary mt-3">Cetak</button>
                                    </div>
                                </div>
                            </div>
                            <!-- data table end -->
                        </div>
                        </div>
                    </div>
                    <!-- sales report area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->

    <script>
        function printWithdrawalHistory() {
            // Mencetak tabel menggunakan JavaScript
            var printContents = document.getElementById('withdrawal-table').outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection