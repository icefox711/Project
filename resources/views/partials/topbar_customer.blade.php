<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="{{ route('customer.index')}} " class="navbar-brand">
      <span class="brand-text font-weight-light">MetMart</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('customer.index') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customer.kantin') }}" class="nav-link">Kantin</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customer.keranjang') }}" class="nav-link">keranjang</a>
        </li>
      </ul>
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item float-right">
        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
      </li>
    </ul>
    <div class="dropdown">
      <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle" type="button"
          id="reportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
      </button>
      <div class="dropdown-menu" aria-labelledby="reportDropdown">
          <a class="dropdown-item" href="{{ route('customer.riwayat.transaksi') }}">
              <i class="fas fa-file-invoice-dollar"></i> Transaksi
          </a>
          <a class="dropdown-item" href="{{ route('customer.riwayat.topup') }}">
              <i class="fas fa-file-invoice-dollar"></i> Top Up
          </a>
          <a class="dropdown-item" href="{{ route('customer.riwayat.withdrawal') }}">
              <i class="fas fa-file-invoice-dollar"></i> Tarik Tunai
          </a>
      </div>
  </div>
  </div>
</nav>