@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-10 ">
                <div class="card mt-2 ">
                    <div class="card-header ">
                        <h3><i class="fas fa-edit"></i> form create category foto</h3>
                    </div>
                    <form action="{{'/category'}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body ">
                            <div class="row justify-content-center" >

                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="categoryPhoto">category photo</label>
                                        <input type="text" class="form-control @error('categoryPhoto') is-invalid @enderror" id="categoryPhoto" name="categoryPhoto"
                                        placeholder="category" value="{{@old('categoryPhoto')}}">
                                        @error('categoryPhoto')
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
                                       <label for="">example image</label>
                                        <div class="input-group">       
                                            <input type="file" class="custom-file-input  @error('exampleImage') is-invalid @enderror" id="exampleImage"
                                                name="exampleImage" >       
                                            <label class="custom-file-label"
                                                for="exampleImage">choose example Image</label>
                                                @error('exampleImage')
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
                                        <label for="priceCategory">price category</label>
                                        <input type="number" class="form-control @error('priceCategory') is-invalid @enderror" id="priceCategory" name="priceCategory"
                                            placeholder="Rp" value="{{@old('priceCategory')}}">
                                            @error('priceCategory')
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="enter .." value="{{@old('description')}}"></textarea>
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
                                    <a href="{{'/category'}}">
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
