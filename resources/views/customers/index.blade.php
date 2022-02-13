@extends('layouts.customer')
@section('contents')
<div class="container">
  <div class="row ">
    <div class="col-md-2 " style="margin-top: 7rem">
      <h1><img src="{{asset('foto/logo/logo.png')}}" alt="logo" width="170px" class="rounded"></h1>
    </div>
      <div class="col-md-6" style="margin-top: 7rem">
        <h3 class="text-shadow" >Radja Studi Photos</h3>
      </div>
     
  </div>
</div>
<div class="container mt-3" >
    <div class="row " style="margin-top: 4rem">
        <div class="col-md-3">
            <form class="">
                <input class="form-control mr-sm-2" type="search" id="cari" placeholder="Search" aria-label="Search">
              </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <span>See All</span>
            <span class="badge badge-danger navbar-badge" id="message">0</span>
<button class="btn btn-sm float-right text-light mt-3" style="background-color: #060606" ><i class="fas fa-cart-plus fa-lg mr-2" style="color:white" id="message"  > </i>pesanan</button>
        </div>
    </div>
    <div class="row mt-3">
      
      @foreach ($category as $item)
          
      <div class="col-md-4 ">
        <div class="card m-1" >
          <div class="row">
            <div class="col-md-10">
              <span class="text-center">No.{{$loop->iteration}}</span>
              <img class="card-img-top" id="img" src="{{asset('/photo-category/'.$item->exampleImage )}}" alt="Card image cap" height="300px">

            </div>
          </div>
            <div class="card-body">

              <h5 class="card-title">{{$item->categoryPhoto}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <h5>Rp.{{$item->priceCategory}}</h5>
              <a href="#" class="btn btn-sm float-right" id="btnCart" >Booking</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    
    <div class="row mt-3">
      <div class="col-md-4">
        <h3>Pilhan Bingkai </h3>
      </div>
    </div>
   <div class="row">
     @foreach ($product as $item)
     <div class="col-md-4">
       <div class="card mt-2 mr-2" >
         <div class="row">
           <div class="col-md-10">
             <img class="card-img-top" id="img" src="{{asset('/foto-product/'.$item->image)}}" alt="Card image cap" height="300px">
           </div>
         </div>
         <div class="card-body">
           <h5 class="card-title">{{$item->description}}</h5>
           <p class="card-text">stock: {{$item->stock}}</p>
           <h5>Rp.{{$item->unitPrice}}</h5>
           <a href="#" class="btn btn-sm float-right" id="btnBuy">$  Buy</a>
          </div>
        </div>
      </div> 
      @endforeach
    </div>
</div>
</div>
<script>
  $(document).ready(function () {
    let message = 1;
    $(document).on("click",'#btnCart', function () {
        $("#message").text(message++);
        toastr.info("booking photo telah dibuat lihat di pesanan");

    });
    $(document).on("click",'#btnBuy', function () {
        $("#message").text(message++);
        toastr.info("Binkai telah dipilih lihat dipesanan");

    });
});
</script>
@endsection