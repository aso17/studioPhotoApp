@extends('layouts.admin')
@section('content')

<section class="content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=""> <i class="fas fa-outdent"></i> list category photos</h4> 
                        <div class="card-body ">
                            <table id="category" class="table table-bordered table-sm table-hover table-responsive-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>category foto</th>
                                        <th>description</th>
                                        <th>price category</th>       
                                        <th  >action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)          
                            <tr class="text-center">
                                <td>{{$loop->iteration}}.</td>
                                <td>{{$item->categoryPhoto}}</td>
                                <td>{{$item->description}}</td>
                                <td>Rp.{{$item->priceCategory}}</td>
                                <td>
                                    <a href="http://"><button id="btnedit">edit</button></a>
                                    <a href="http://"><button id="btnhapus">hapus</button></a>
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

<script>
  $("#category").DataTable({
"responsive": true,
"autoWidth": true,
"info": false,
"lengthChange": true,
"scrollY": 650,
"paging": true,

dom: 'Bfrtip',
buttons: [{
    text: 'Create category',
    className: 'bg-dark m-2 border rounded',
 
    action: function() {
        window.location.href = "category/create"
    }
}]

});
</script>

@endsection