<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>app</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css ') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('asset/css/mystyle.css') }} ">
    {{-- code css gue --}}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/toastr/toastr.min.css') }}">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">



    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/plugins/jquery/jquery.min.js') }} ">
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/js/my.js') }} ">
    </script>
    <!-- Bootstrap 4 -->
    <script language="JavaScript" type="text/javascript"
        src=" {{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
    
    <!-- DataTables -->
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset/toastr/toastr.min.js') }}"></script>

    <!-- Sweetalert -->
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/plugins/toastr/toastr.min.js') }}">
        </script>

    
</head>

<body style="background:">

    <nav class="navbar navbar-expand-lg navbar-light  fixed-top" style="background">
       <h5><img src="{{asset('/photo-users/'.session('img'))}}" height="60px" width="60px" alt="" 
        style="border-radius:100%; background-color:rgb(219, 153, 29)"><span class="ml-2">{{session('name')}}</span></h5>
        
        <div class="collapse navbar-collapse justify-content-end text" id="navbarNav">
          <ul class="navbar-nav"  > 
           
            <li class="nav-item">
              <a class="nav-link text-light  btn btn-success btn-sm mr-2" href="{{'/customer' }}" style="background-color: #060606">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light  btn btn-success btn-sm mr-2" href="{{'/customer/create'}}" style="background-color: #060606">pemesanan</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light  btn btn-success btn-sm mr-2" href="{{'/customer/create'}}" style="background-color:#060606">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light  btn btn-success btn-sm mr-2" href="#" style="background-color:#060606">pengaturan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light  btn btn-success btn-sm mr-2" href="#" style="background-color:#060606">Bantuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light  btn btn-success btn-sm mr-2" href="#" style="background-color:#060606" id="logout">Logout</a>
            </li>      
          </ul>
        </div>
    </nav>
      <div class="container-fluid">
        @yield('contents')
    </div>

    <script language="JavaScript" type="text/javascript">
      toastr.options = {
          "closeButton": false,
          "debug": true,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-center mt-3",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "10000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      }
  </script>
  @if (session('success'))
      <script language="JavaScript" type="text/javascript">
          toastr.success("{{ session('success') }}");
      </script>

  @endif

  @if (session('info'))
      <script>
          toastr.info("{{ session('info') }}");
      </script>

  @endif
  @if (session('warning'))
      <script>
          toastr.warning("{{ session('warning') }}");
      </script>

  @endif
  @if (session('error'))
      <script>
          toastr.error("{{ session('error') }}");
      </script>

  @endif
  <script>
      $('.custom-file-input').on('change', function() {
          let filename = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(filename);
      });
  </script>
</body>

</html>