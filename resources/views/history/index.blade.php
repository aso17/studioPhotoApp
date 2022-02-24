@extends('layouts.customer')
@section('contents')
<div class="container">
  <div class="row "> 
      <div class="col-md-6" style="margin-top: 7rem">
        <h5 class="text-shadow text-success" >Total Tagihan</h5>
      </div> 
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="card-header text-success "> <i class="fa fa-address-book" aria-hidden="true"></i> Name  : {{ session('name') }}</div>
          <div class="card-header text-success"> <i class="fa fa-map-marker" aria-hidden="true"></i>  Addres : {{ session('alamat') }}</div>
          <div class="card-header text-success"> <i class="fa fa-phone-square" aria-hidden="true"></i> Phone  : {{ session('no_phone') }}</div>
        </div>
      </div>
      @foreach ($order as $item)        
      <div class="list-group " >
        <button type="button" class="list-group-item list-group-item-action ">
          <h5>ID transaction : {{ $item->kodeTransaksi }} </h5>
          <p class="text-right text-danger">Status : {{ $item->status }} </p>
          <div class="">          
            <div class="card-body">
              <p class="card-title"> Photo     : {{ $item->categoryPhoto }}</p>
              <p class="card-text"> date order  : {{ $item->dateOrder }}</p>
              <h5 class="card-text">Total bayar Rp.{{ number_format($item->totalPrice )}}</h5>              
              <span class="text-success">Total pemabayaran sudah termasuk bingkai</span>
            </div>
          </div>
        </button>     
      </div>
      @endforeach
        </div>     
  </div>
</div>
</div>
</div>
<script>
$(document).ready(function () {
$(document).on("click",'#btnTf', function (e) {          
  const kdtrasaksi= $(this).data('kd');
 let inputanKd=$('#kdTransaksi');
 inputanKd.val(kdtrasaksi);
  
});
});
</script>
@endsection