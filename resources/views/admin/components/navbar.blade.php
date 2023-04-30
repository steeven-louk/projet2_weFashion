<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-none align-items-center justify-content-center">
    <span class="navbar-brand brand-logo-mini" >we fashion</span>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link btn btn-success create-new-button text-capitalize"  href="{{ route('home') }}">
          go to client
        </a>
       
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
          <div class="navbar-profile">
            
            <p class="mb-0  d-sm-block navbar-profile-name h5 text-uppercase">{{ Auth::user()->name }}</p>
          </div>
        </a>
       
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>