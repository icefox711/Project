@extends('layout.main')

@section('content')

    <!-- Container Fluid--> 
        <div class="container">
            <div class="row">
            <div class="col-md-6" style="margin-top: 40px;">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">{{ auth()->user()->name }}</h3>
                    <h5 class="widget-user-desc">{{ auth()->user()->email}}</h5>
                  </div>
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">Rp.{{number_format($wallet->saldo,0,',','.')}},00</h5>
                          <span class="description-text">SALDO</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <button class="btn btn-success btn-lg" data-target ="#tariktunaiModal"
                            data-toggle="modal" type="button">Tarik Tunai</button>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                            <button class="btn btn-success btn-lg" data-target ="#topupModal"
                            data-toggle="modal" type="button">Top Up</button>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->        
                </div>
                <!-- /.widget-user -->
              </div>
        <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="topupModalLabel">Top Up</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customer.topup') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="rekening">Rekening</label>
                                <input id="rekening" name="rekening" type="text" placeholder=""
                                    class="form-control" required value="{{ $wallet->rekening }}">
                            </div>

                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                                    required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ms-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Top Up</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tariktunaiModal" tabindex="-1" role="dialog"
            aria-labelledby="tariktunaiModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tariktunaiModalLabel">Tarik Tunai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="{{route('customer.withdrawal')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="rekening" name="rekening" type="hidden" placeholder=""
                                    class="form-control" required value="{{ $wallet->rekening }}">
                            </div>

                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                                    required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ms-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tarik Tunai</span>
                            </button>
                        </div>
                    </form> 
                </div>
                </div>
            </div>
        </div>
        </div>
        <!---Container Fluid-->
        @endsection
