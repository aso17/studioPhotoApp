<div class="container-fluid">

    <style>
        h3 {
            text-align: left;
            margin: 0%;
        }


        h5 {
            text-align: center;
            margin: 0%;
        }

        h4 {
            text-align: center;
            margin: 0%;
        }

        p {
            text-align: right;
            margin: 0%;
            margin-top: 0%;
            margin-bottom: 3px;
        }

        

        th {
            height: 40px;
            width: 90px;
            padding: 0%;
            margin:4px;
            color: rgb(63, 124, 39)
        }

        td {
            text-align: center;
            width: 90px;
            margin:4px;
        }

        .m {
            text-align: right;
            margin-right: 30px;
            margin-top: 80px;
        }
        .table {
            text-align: left;
            margin-right: 30px;
            margin-top: 50px;
            width: 100%;

        }
      #grand{

        text-align: right;
        margin-top: 15px;
        color: rgb(161, 15, 15);
      }
      

    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card card-outline">
                        <h3 class="mt-2 pl-2">Radja Studio Photos</h3><br>                  
                        <div class="card-header  ">
                            <h4 class=" text-dark text-center pl-2"> Report Studio Photos</h4>
                            <h5 class=" text-dark text-center"><span class="text-primary">
                                    Tanggal: </span>{{ $tglAwal }} <span class="text-primary">
                                    s/d</span> {{ $tglAhir }} <br>

                                <span class="text-right m-0">Tanggal cetak : {{ date('d/m/y') }}</span>
                            </h5>
                            <p class="text-right m-0">User : {{ session('fullName') }}</p>
                        </div>
                        <hr>
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
                                            <tr >
                                               
                                                <td colspan="7" id="grand">  Total : Rp.{{ number_format($total)  }}</td>
                                            </tr>
                                        </tbody>
                                       
                                           
                                                
                                        
                                        
                                    </table>
                                    <div id="total">
                                       
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <table class="table" border="0">
                                <tr>
                                    <td style="width:350px;text-align:center;"></td>

                                    <td class="m" style="width:350px;text-align:center;">Mengetahui
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:350px;text-align:center;height:200px">
                                       </td>

                                    <td class="m" style="width:350px;text-align:center; ">
                                        (.................................................)</td>
                                </tr>

                            </table>
                           
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
