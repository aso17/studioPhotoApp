@extends('layouts.customer')
@section('contents')
<div class="container">
  <div class="row "> 
      <div class="col-md-6" style="margin-top: 7rem">
        <h5 class="text-shadow text-success" >Total Tagihan</h5>

      </div> 
      </div>
      <div class="card-header text-success "> <i class="fa fa-address-book" aria-hidden="true"></i> Name  : {{ session('name') }}</div>
      <div class="card-header text-success"> <i class="fa fa-map-marker" aria-hidden="true"></i>  Addres : {{ session('alamat') }}</div>
      <div class="card-header text-success"> <i class="fa fa-phone-square" aria-hidden="true"></i> Phone  : {{ session('no_phone') }}</div>
      <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action ">
          <h5>ID transaction : 1 </h5>
        </button>
        <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
        <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
        <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
        <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
      </div>
        </div>
      
  </div>
</div>
</div>
</div>
@endsection