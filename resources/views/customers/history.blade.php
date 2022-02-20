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
      <div class="list-group " >
        <button type="button" class="list-group-item list-group-item-action ">
          <h5>ID transaction : 1 </h5>
        </button>
        @foreach ($order as $item)         
        <button type="button" class="list-group-item list-group-item-action border-top-0">{{ $item->categoryPhoto }} <span class="badge  float-right ">Rp.{{ number_format($item->priceCategory) }}</span></button>
        <button type="button" class="list-group-item list-group-item-action border-top-0">{{ $item->description }} <span class="badge  float-right ">Rp.{{ number_format($item->unitPrice) }}</span></button>
        @endforeach
      </div>
        </div>
      
  </div>
</div>
</div>
</div>
@endsection