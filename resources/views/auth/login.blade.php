<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>app</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
   
    <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/toastr/toastr.min.css') }}">
   

</head>

<body class="hold-transition login-page" style="background :#060606">
    <div class="login-box" >
        <!-- /.login-logo -->
        <div class="card" style="background-color:wheat">
            <div class="card-header">
                <div class="login-logo">
                    <a href="/" style=" color:"><b> Radja</b>Foto</a>
                </div>

            </div>
            <div class="card-body login-card-body" style="background-color:wheat">
                <p class="login-box-msg">Masukkan email dan password</p>

                <form method="POST" action="{{'sigIn'}}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="password"
                            name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn btn-block" style="background-color: #060606; color:wheat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            Belum punya akun? Silahkan 
                            <a href="{{'/registrasi'}}" class="ml-1 text-dark"> <b> Register</b></a>
                        </div>
                    </div>

                </form>

                <div class="social-auth-links text-center mb-3">

                    <!-- /.login-card-body -->
                </div>
            </div>
          
    <!-- jQuery -->
    <script src="{{ asset('asset/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('asset/plugins/toastr/toastr.min.js') }}"></script>
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