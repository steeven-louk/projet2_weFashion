<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('_admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- Plugin css for this page -->

    <link rel="stylesheet" href="{{ asset('_admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                @if (session()->has('error'))
                    <button type="button" data-dismiss="alert">X</button>
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif

                <h3 class="card-title text-left mb-3">Login</h3>

                <form method="post" action="{{ route('connection') }}">

                  @csrf

                  <div class="form-group">
                    <label>Email *</label>
                    <input type="email" value="{{ old ('email') }}" name="email" required class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" required class="form-control p_input">
                  </div>
   
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Connection</button>
                  </div>
            
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('_admin/assets/js/hoverable-collapse.js') }}"></script>
  </body>
</html>