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
            <span class="text-success">See All</span>
            <span class="badge badge-danger navbar-badge" id="message"></span>
<button class="btn btn-sm float-right text-light mt-3" style="background-color: #060606" data-toggle="modal" data-target="#modalDetail"><i class="fas fa-cart-plus fa-lg mr-2" style="color:white" id="message"  > </i>pesanan</button>
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

              <h5 class="card-title text-success">{{$item->categoryPhoto}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <h5>Rp.{{$item->priceCategory}}</h5>
              <button class="btn btn-sm float-right" id="btnCart" 
              data-id="{{$item->id}}"
              data-nama="{{$item->categoryPhoto}}"
              data-harga="{{$item->priceCategory}}"
              data-ket="{{$item->description}}"   
              >Booking</button>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    
    <div class="row mt-3">
      <div class="col-md-4">
        <h3 class="text-success">Pilhan Bingkai </h3>
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
           <button class="btn btn-sm float-right" id="btnBuy"
           data-id_bingkai="{{$item->id}}"
           data-des="{{$item->description}}"
           data-unit="{{$item->unitPrice}}"
           data-stock="{{$item->stock}}"    
           >$  Buy</button>
          </div>
        </div>
      </div> 
      @endforeach
    </div>
</div>
</div>

{{-- modaldetail --}}

<!-- Modal -->
<form action="{{'customer'}}" method="POST">
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">detail order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">        
          <div class="card-body">
              @csrf           
              <div class="container" >
                <h5 class="text-success"> order jenis Photo</h5>
                <div class="row">
                  <div class="col-md-12" id="orderPhoto">
                  </div>                 
                </div>
               <h5 class="text-success"> order bingkai</h5>
                <div class="row ">
                  <div class="col-md-8" id="orderBingkai">
                  </div>
                
                  
                </div>
                 <div class="row">
                  <div class="col-md-12  " id="orderdate">
                    <input type="date" id="dateOrder" name="dateOrder">
                  </div>
                </div>          
              </div>                 
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="btnSave">orders</button>
            <button type="button" id="btnCancel" data-dismiss="modal">cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    let message = 1;
    $(document).on("click",'#btnCart', function (e) {
      
      
      const idcategory= $(this).data('id');
  
      const categoryPhoto= $(this).data('nama');
      const ket= $(this).data('ket');
      const harga= $(this).data('harga');
           
      if(check(idcategory)==false){
            $("#message").text(message++);
            toastr.info("booking photo telah dibuat lihat di pesanan");           
            $('<input>').attr({
              type: 'hidden',
              id: 'idcategory',
              name: 'idcategory',
              value: idcategory
            }).appendTo('#orderPhoto');
            $('<li >').text(categoryPhoto).appendTo('#orderPhoto');
              $('<li id="harga">').text(`${harga}`).appendTo('#orderPhoto');
                $('<li id="ket">').text(ket).appendTo('#orderPhoto');                                
                  $('#total').val(harga);
                  let hrg1=  $('#harga').text();
                  let hrg2=parseInt(hrg1);                  
                  $('#subtotal').val(`${hrg2+= parseInt(harga)}`);                
                  e.preventDefault();                  
                }else{
                  toastr.error("Pesanan anda sama dengan sebelumnya");
                  location.reload();
                  
                  
                }
                
                              
              });
              
              $(document).on('click','#btnCancel',function(){
  location.reload();

});


    $(document).on("click",'#btnBuy', function () {
        $("#message").text(message++);
        toastr.info("Binkai telah dipilih lihat dipesanan");     
        const bingkaiId= $(this).data('id_bingkai');
        $('#idCategory').val(bingkaiId);
        const des= $(this).data('des');
        const stok= $(this).data('stock');
        const unit= $(this).data('unit');
        $('<input>').attr({
            type: 'hidden',
            id: 'product_id',
            name: 'product_id',
            value: bingkaiId
        }).appendTo('#orderPhoto');
       
        
       $('<li >').text(des).appendTo('#orderBingkai'); 
          $('<li>').text(`stock:${stok}`).appendTo('#orderBingkai');   
            $('<li id="unit">').text(`Rp.${unit}`).appendTo('#orderBingkai');

    });
});
</script>

<script>
  
  function check(idcategory){
    let hrg1=  $('#idcategory').val();
return hrg1==idcategory;


  }
</script>

@endsection