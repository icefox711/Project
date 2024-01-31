    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('bank.index')}}  ">
          <div class="sidebar-brand-icon">
            <img src="img/logo/logo2.png">
          </div>
          <div class="sidebar-brand-text mx-3">Halaman Bank</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('bank.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Features
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaksi</span>
          </a>
          <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" class="{{$title === 'Data Produk' ? 'active' : ''}} "  href="{{route('bank.topup')}}">Top Up</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" class="{{$title === '' ? 'active' : ''}} "  href=" {{route('bank.withdrawl')}} ">Tarik Tunai</a>
            </div>
          </div>
        </li>
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
      </ul>
      <!-- Sidebar -->