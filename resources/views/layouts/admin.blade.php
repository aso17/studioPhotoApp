<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css ') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('asset/css/mystyle2.css') }} ">
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light text-light " style="background:#2F4F4F ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars bg-warning"></i></a>

                </li>

                <h6 class="text">Padang<br>Jalan Gatot Subroto, <br>Kadu, Curug, Kadu, Kec. Curug, Kota
                    Padang, sumut
                    15810
                </h6>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button onclick="logConfirm('')" class="btn btn btn-sm text-light" class="nav-link "
                        id=" logoutmodal" data-toggle="modal" data-target="#logoutmodal"
                        style="background-color:#e01d1d"><i class="fas fa-sign-out-alt"></i>Exit</button>
                </li>
            </ul>
        </nav>
    
        <aside class="main-sidebar sidebar-dark-primary elevation-4 text-center" style="background:#2F4F4F ">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('foto/logo/logo.png') }} " alt="AdminLTE Logo" class="img-thumbnail"
                    width="220px" height="70px" class="img-thumbnail" style="background: #2F4F4F;border-color:#2F4F4f"><br>
                <span class=" brand-text">Radja Photos</span> <br>
            </a>

            <div class="sidebar ">
               
                <nav class="mt-4 ">
                    <ul class="nav nav-pills nav-sidebar flex-column  " data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item text-left">
                            <a href="{{ url('/Dashboard') }}" class="nav-link ">
                                <h6 class="text-light ">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                </h6>

                            </a>
                        </li>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                           
                                <li class="nav-item  text-left">
                                    <a href="{{ url('/adminCustomers') }}" class="nav-link ">
                                        <h6 class="text-light ">
                                            <i class="fas fa-address-card pr-1 "></i>Customers
                                        </h6>
                                    </a>
                                </li>
                               
                        

                                <li class="nav-item  text-left">
                                    <a href="{{ url('/product') }}" class="nav-link ">
                                        <h6 class="text-light ">
                                            <i class="fas fa-address-card pr-1 "></i>Products
                                        </h6>
                                    </a>
                                </li>
                                <li class="nav-item  text-left">
                                    <a href="{{ url('/category') }}" class="nav-link ">
                                        <h6 class="text-light ">
                                            <i class="fas fa-address-card pr-1 "></i>Category
                                        </h6>
                                    </a>
                                </li>
                               
                         

                                <li class="nav-item text-left">
                                    <a href="{{ url('/report') }}" class="nav-link">
                                        <h6 class=" text-light">
                                            <i class="fas fa-file-invoice "></i>
                                            Laporan
                                        </h6>
                                    </a>
                                </li>
                          
                                <li class="nav-item text-left">
                                    <a href="{{ '/user' }}" class="nav-link" class="nav-link">
                                        <h6 class=" text-light">
                                            <i class="fas fa-user-cog"></i>
                                            Users
                                        </h6>
                                    </a>
                                </li>
                          


                        </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer text-light " style="background:#2F4F4F ">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Powered by <a href="https://gisaka.net/">Liana</a>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <a href="">Radja Foto</a> .</strong> All
            rights
            reserved.
        </footer>
    </div>
    <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ '/logout' }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center">
                                <i class="fas fa-exclamation" style="font-size: 70px; color:#008B8B;"></i>
                            </div>
                            <div class="col-9 pt-2">
                                <h6>yakin ingin keluar?</h6>

                            </div>
                        </div>

                </div>
                <div class="modal-footer">

                    <button id="btn-log" class="btn btn tambah btn-danger" type="submit" name="submit">Exit</button>
                    <button type="button" class="btn btn cancel text-dark" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <!-- Alert Config -->







    <script language="JavaScript" type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": true,
            "newestOnTop": true,
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
