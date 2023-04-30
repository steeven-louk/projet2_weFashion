<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

    <span class="sidebar-brand brand-logo text-capitalize fw-bold ">we fashion</span>

  </div>
  <ul class="nav gap-2">
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link @if(Route::currentRouteName() == 'dashboard') active @endif" href="{{ route('dashboard') }}" >
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link @if(Route::currentRouteName() == 'admin.produitsHomme') active @endif" href="{{ route('admin.produitsHomme') }}" >
        <span class="menu-icon">
          <i class="mdi mdi-gender-male"></i>
        </span>
        <span class="menu-title">Men</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('admin.produitsFemme') }}">
        <span class="menu-icon">
          <i class="mdi mdi-account"></i>
        </span>
        <span class="menu-title">Women</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('admin.ajouterProduit') }}">
        <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">Add Product</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('logout') }}">
        <span class="menu-icon">
          <i class="mdi mdi-logout"></i>

        </span>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  
  </ul>
</nav>