<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bank UMKM Application</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('borrower/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('borrower/sb-admin-2.css') }}" rel="stylesheet">
  
  <link href="{{ asset('borrower/vendor/select2-develop/dist/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('borrower/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('borrower/custom.css')}}" rel="stylesheet">
  @stack('stylesheet')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('borrower.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('borrower.layouts.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">{{$jumbotron}}</h1>
          @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
          @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
          
          @if (request()->is('dashboard'))
              @yield('body')
          @else
            <div class="row justify-content-center">
              @yield('body')
            </div>
          @endif


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('borrower.layouts.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">{{__('logout-modal.question')}}</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('logout-modal.btn-no')}}</button>
          <form method="GET" action="{{route('api.logout')}}">
            <a class="btn btn-primary" href="#"
                    onclick="event.preventDefault();
                    this.closest('form').submit();" >
            {{__('logout-modal.btn-yes')}}</a>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('borrower/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('borrower/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('borrower/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('borrower/js/sb-admin-2.min.js')}}"></script>
  
  <script src="{{ asset('borrower/vendor/select2-develop/dist/js/select2.min.js')}}"></script>
  <script src="{{ asset('borrower/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('borrower/js/custom.js') }}"></script>

  <!-- Extra scripts -->
  @stack('script')
</body>

</html>
