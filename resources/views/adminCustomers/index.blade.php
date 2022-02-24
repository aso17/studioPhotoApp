@extends('layouts.admin')
@section('content')

<section class="content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=""> <i class="fas fa-outdent"></i> list Pesanan</h4> 
                        <div class="card-body ">
                            <table id="category" class="table table-bordered table-sm table-hover text-center table-responsive-sm ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kd transaksi</th>
                                        <th>fullname</th>
                                        <th>Addres</th>       
                                        <th>no Tlp</th>       
                                        <th>status</th>       
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order as $item)
                                           
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kodeTransaksi }}</td>
                                        <td>{{ $item->fullName }}</td>
                                        <td>{{ $item->addres }}</td>
                                        <td>{{ $item->phoneNumber }}</td>
                                        <td><span class="badge badge-info">{{ $item->status }}</span></td>
                                        <td>
                                            <button id="btnedit" 
                                            data-date_order="{{ $item->dateOrder }}"
                                            data-totalprice="{{ $item->totalPrice }}"
                                            data-buktitf="{{ $item->proofTransfer }}"
                                            data-kode="{{ $item->kodeTransaksi }}"
                                            data-toggle="modal" data-target="#exampleModal" >view</button>
                                        </td>
                                    </tr>
                                    @endforeach
                           
                                </tbody>
                            </table>
                        </div>
                                         
                    </div>
                   
                </div>
            </div>
         
        </div>

    </div>
</section>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card" >
                <img class="card-img-top" id="img" src="" alt="Card image cap" height="500px">
               
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" id="kd"></li>
                    
                </ul>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" id="tglOrder"></li>            
                </ul>           
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" id="total"></li>            
                </ul>           
              </div>

        </div>
        <form action="{{'adminCustomers' }}" method="post">
         @csrf
         
            <input type="hidden" name="kode_transaksi" id="kode_transaksi">
        <div class="modal-footer">
            <button type="submit" class="btn " id="btnsave">konfirmasi</button>
          <button type="button" class="btn " data-dismiss="modal" id="btncancel">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>
 
  <script>
    $(document).ready(function() {
        $(document).on('click', '#btnedit', function() {
            const tgl1 = $(this).data('date_order');
            const kod = $(this).data('kode');
            const total1 = $(this).data('totalprice');
            const img = $(this).data('buktitf');           
            $('#kd').text(`ID Transaksi :${kod}`);
            $('#kode_transaksi').val(`${kod}`);
            $('#tglOrder').text(`Date Order :${tgl1}`);
            $('#total').text(`Grand Total :Rp.${total1}`);
            $('#img').attr('src', '{{ asset('file-buktiTransfer') }}/' + img);       
        })
    })
</script>

<script>
  $("#category").DataTable({
"responsive": true,
"autoWidth": true,
"info": false,
"lengthChange": true,
"scrollY": 650,
"paging": true,



});
</script>

@endsection