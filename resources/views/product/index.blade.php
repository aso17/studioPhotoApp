@extends('layouts.admin')
@section('content')

<section class="content">
    <div class="container-fluid mt-3" style="margin-top: 7rem">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="">list product bingkai</h3> 

                        <a href="{{'/product/create'}}" class="float-right btn btn-lg"><button id="btnadd">create product</button></a>
                                         
                    </div>
                                    <div class="row">
                                @foreach ($product as $item)
                                           <div class="col-md-3">
                                               <div class="card m-3">
                                                   <div class="card-header">
                                                   <span>{{$item->description}}</span>
                                                   </div>
                                                   <div class="row mt-1">
                                                       <div class="col-md-10 ">
                                                           <img class="card-img" id="img" src="{{asset('/foto-product/'.$item->image)}}" alt="Card image cap" height="200px">
                                                       </div>
                                                   </div>
                                                   <div class="card-body">
                                                       <h5 class="card-title">Rp.{{$item->unitPrice}}</h5>
                                                       <p class="card-text">stock:{{$item->stock}}</p>
                                                     
                                                       <a href="#" class="btn   float-right"  id="btnhapus">hapus</a>
                                                       <a href="#" class="btn   float-right mr-2"  id="btnedit">edit</a>
                                                    </div>
                                                </div>
                                            </div>               
                                            @endforeach
                                        </div>
                   
                </div>
            </div>
         
        </div>

    </div>
</section>
{{-- 
<script>
  $("#product").DataTable({
"responsive": true,
"autoWidth": true,
"info": false,
"lengthChange": true,
"scrollY": 650,
"paging": true,

dom: 'Bfrtip',
buttons: [{
    text: 'Create Product',
    className: 'bg-dark m-2 border rounded',
    action: function() {
        window.location.href = "/createproduct"
    }
}]

});
</script> --}}

@endsection