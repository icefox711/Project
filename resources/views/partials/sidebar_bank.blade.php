<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('bank.index') }}" class="brand-link">
    <span class="brand-text font-weight-light">MetMart Bank</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('bank.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('bank.topup') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Top up
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('bank.withdrawl') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Withdrawal
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>