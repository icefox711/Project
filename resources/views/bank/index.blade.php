@extends('layout.main')
@section('content')
<div class="page-container">
  <div class="row">
    <div class="col" style="padding-left: 250px">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item float-right">
              <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>

@endsection