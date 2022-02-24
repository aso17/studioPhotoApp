@extends('layouts.admin')
@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class=""><i class="fas fa-bars"></i> Report Priode</h5>
                    </div>
                    <div class="card-body">
                        <div class="card card-outline">
                            <div class="card-body">
                                <div class="row">                 
                                    <div class="col-md-10" style="overflow: initial">               
                                        <form method="post" action="/report" enctype="">
                                            @csrf
                                            <div class="card-body">                                           
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">

                                                            <label for="tgl_awal">Tanggal </label>
                                                            <input type="date"
                                                                class="form-control @error('tgl_awal') is-invalid @enderror "
                                                                id="tgl_awal" name="tgl_awal"
                                                                value="{{ old('tgl_awal') }}" autocomplete="off">

                                                            @error('tgl_awal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <h5 class="mt-5">s/d</h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">

                                                            <label for="tgl_ahir"> Tanggal</label>
                                                            <input type="date"
                                                                class="form-control @error('tgl_ahir') is-invalid @enderror "
                                                                id="tgl_ahir" name="tgl_ahir"
                                                                value="{{ old('tgl_ahir') }}" autocomplete="off">

                                                            @error('tgl_ahir')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-11">

                                                    <button class="float-right mr-3" type="submit"
                                                        name="submit" id="btnsave"></i> Priview</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
