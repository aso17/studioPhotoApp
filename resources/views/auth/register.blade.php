<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>app</title>

    <!-- Google Font: Source Sans Pro -->
  
    <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/toastr/toastr.min.css') }}">
    <link rel="icon" href="{{ asset('foto/logo/logo.png') }}" type="image/png">
</head>

<body class="hold-transition register-page" style="background:#060606">
<!-- <body class="hold-transition register-page"> -->
    <div class="register-box"  style="background-color:wheat">
        <div class="register-logo">
            <a href="/"><b>Radja</b>Foto</a>
        </div>

<div class="card" >
            <div class="card-body register-card-body"  style="background-color:wheat">
                          <p class="login-box-msg">Register a new membership</p>

                <form method="post" action="{{'/registrasi'}}" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="input-group mb-3">
                        <input id="fullName" type="text" class="form-control @error('fullName') is-invalid @enderror"
                            placeholder="fullName" name="fullName" value="{{ old('fullName') }}" required autocomplete="fullName"
                            autofocus>

                        @error('fullName')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                      
                    </div>
                    <div class="input-group mb-3">
                        <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                            placeholder="phone number" name="phoneNumber" value="{{ old('phoneNumber') }}"  autocomplete="name"
                            autofocus>

                        @error('phoneNumber')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                      
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="email" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                       
                    </div>
                   
                    <div class="input-group mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="password"
                            name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror                     
                    </div>
                    <div class="input-group mb-3">            
                  <div class="input-group">       
                  <input type="file" class="custom-file-input  @error('photo') is-invalid @enderror" id="photo" name="photo" >       
                 <label class="custom-file-label"
                                        for="photo">Choose</label>
                                        @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>  
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control  @error('addres') is-invalid @enderror" name="addres" value="{{@old('addres')}}" placeholder="Addres" id="floatingTextarea2" style="height: 100px"></textarea>
                        @error('addres')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                       
                    </div>
                    <div class="row">
                       
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm float-right" style="background-color: #060606; color:wheat;">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            Sudah punya akun? Silahkan 
                            <a href="{{'/'}}" class="ml-1 text-dark"> <b> Login</b></a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
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