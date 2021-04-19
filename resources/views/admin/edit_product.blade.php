@extends('layouts.admin')
@section('content')


<div class="row ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Add New Product
                </div>
            </div>
            <div class="card-body">
                <div id="wizard3">
                    <form action="{{ route('admin.update-product',$product) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control required" value="{{$product->name}}">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">description</label>
                                <input type="text" name="description" class="form-control required"
                                    placeholder="description" value="{{$product->description}}">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control required" placeholder="Price" value="{{$product->price}}" >
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control required"
                                    placeholder="Quantity" value="{{$product->quantity}}">
                            </div>
                            <div class="control-group form-group mb-0">
                                <label class="form-label">Tags</label>
                                <input type="text" name="tags" class="form-control required" placeholder="Tags" value="{{$product->tags}}">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control required" placeholder="Image" >
                            </div>



                            <div class="control-group form-group">
                                <label class="form-label">Product Images</label>
                                <input type="file" name="" class="form-control required" placeholder="Image"
                                    multiple >
                            </div>



                            <button class="btn btn-primary">EDIT</button>
                        </section>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
