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
  </div>
</nav>