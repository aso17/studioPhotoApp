

@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-outline">
                        <h4 class="mt-2 pl-2">Radja Studio Photos</h4>
                        <div class="card-header  ">
                            <h5 class=" text-dark text-center pl-2"> Report Studio Photos</h5>
                            <h6 class=" text-dark text-center"><span class="text-primary">
                                    Tanggal : </span>{{ $tglAwal }} <span class="text-primary">
                                    s/d </span>{{ $tglAhir }}
                            </h6>
                            <p class="text-right m-0">Tanggal cetak : {{ date('d/m/y') }}</p>
                            <p class="text-right m-0">User : {{ session('fullName') }}</p>

                            <a href="{{ url('/printPdf/' . $tglAwal . '/' . $tglAhir) }}"
                               ><button class="btn btn-default btn-sm m-0">
                                    <i class="fas fa-file-pdf"></i>
                                    Export
                                    pdf</button></a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <table class="table table-sm table-hover table-responsive-sm text-dark" id="report">
                                        <thead>
                                            <tr class="text">
                                                <tr class="text">
                                                    <th>No</th>
                                                    <th>KD Transaksi</th>
                                                    <th>FullName</th>
                                                    <th>Alamat</th>
                                                    <th>No Tlp</th>
                                                    <th>status</th>
                                                    <th>Total Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}.</td>
                                                <td>{{ $item->kodeTransaksi }}</td>
                                                <td>{{ $item->fullName }}</td>
                                                <td>{{ $item->addres }}</td>
                                                <td>{{ $item->phoneNumber }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>Rp.{{ number_format($item->totalPrice) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <tfoot>
                                        <h5 class="text-right text-success">Grand Total : Rp.{{ number_format($total)  }}</h5>
                                    </tfoot>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection