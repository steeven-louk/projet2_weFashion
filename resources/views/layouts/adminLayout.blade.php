<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>We Fashion Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('_admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_admin/assets/vendors/css/vendor.bundle.base.css') }}">
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('_admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <!-- End plugin css for this page -->
 
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('_admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="{{ asset('_admin/assets/images/favicon.png') }}" />
  </head>
  <body>
        <!-- container-scroller -->

    <div class="container-scroller">

      <!--_sidebar -->
      @include('admin.components.sidebar')

      <!-- partial -->

      <div class="container-fluid page-body-wrapper">

        <!-- _navbar-->
        @include('admin.components.navbar')

        <!-- partial -->

        <div class="main-panel">

          @yield('adminContent')

        </div>
        <!-- main-panel ends -->
      </div>
    </div>
    <!-- container-scroller -->

    @include('admin.components.script')

  </body>
</html>