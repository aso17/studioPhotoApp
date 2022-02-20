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
       <?php 
       if(!$order==""){ ?>
        <p>Uppss belum Order!</p>


        <?php }?>

      @foreach ($order as $item)        
      <div class="list-group " >
        <button type="button" class="list-group-item list-group-item-action ">
          <h5>ID transaction : {{ $item->kodeTransaksi }} </h5>
          <p class="text-right text-danger">Status : {{ $item->status }} </p>
          <div class="">
           
            <div class="card-body">
              <h5 class="card-title"> Photo: {{ $item->categoryPhoto }}</h5>
              <p class="card-text"> date order : {{ $item->dateOrder }}</p>
              <p class="card-text">Total bayar Rp.{{ number_format($item->totalPrice ) }}</p>
              <a href="#" class="btn btn-sm text-light" style="background-color:#060606" data-toggle="modal" data-target="#exampleModal" id="btnTf"
              data-kd="{{ $item->kodeTransaksi }}"
              
              >Bayar</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ '/pemesanan' }}" method="post" enctype="multipart/form-data">
        @csrf 
       
        <input type="hidden" id="kdTransaksi" name="kdTransaksi">
        <div class="row ">
          <div class="col-md-12">
              <div class="form-group">
                 <label for="">bukti transfer</label>
                  <div class="input-group">       
                      <input type="file" class="custom-file-input  @error('buktiTransfer') is-invalid @enderror" id="buktiTransfer"
                          name="buktiTransfer" >       
                      <label class="custom-file-label"
                          for="buktiTransfer">bukti transfer</label>
                          @error('buktiTransfer')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>  
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm" id="btnSave">Send</button>
            <button type="button" class="btn btn-sm" data-dismiss="modal" id="btnCancel">Cancel</button>
          </div>
      </div>
      </div>

       </form>
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