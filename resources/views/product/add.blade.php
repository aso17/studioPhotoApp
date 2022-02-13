@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-10 ">
                <div class="card mt-2 ">
                    <div class="card-header">
                        <h3><i class="fas fa-edit"></i> form create product</h3>
                    </div>

                    <form action="{{'/product'}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body ">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">image</label>
                                        <div class="input-group">       
                                            <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image"
                                                name="image" >       
                                            <label class="custom-file-label"
                                                for="image">pilih image</label>
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
    
                                    <div class="form-group">
                                        <label for="unitPrice">unit price</label>
                                        <input type="number" class="form-control @error('unitPrice') is-invalid @enderror" id="unitPrice" name="unitPrice"
                                            placeholder="Rp">
                                            @error('unitPrice')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
            
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
    
                                    <div class="form-group">
                                        <label for="stock">stock</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock"
                                            placeholder="stock">
                                            @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="enter .."></textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>        
                            <div class="row justify-content-center">
                                <div class="col-md-6  ">
                                    <a href="{{'/product'}}">
                                    <button type="button" class="btn btn-sm  float-right ml-2" id="btncancel">cancel</button></a>
                                    <button type="submit" class="btn btn-sm  float-right" id="btnsave">simpan</button>
                                </div>
                            </div>        

                        </div>

                        <div class="card-footer justify-content-center">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
