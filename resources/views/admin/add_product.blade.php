@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Add Product</h4>
    </div>
</div>


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
                    <form action="{{ route('admin.store-product') }}" method="post" enctype="multipart/form-data">@csrf
                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control required" placeholder="Name">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">description</label>
                                <input type="text" name="description" class="form-control required"
                                    placeholder="description">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control required" placeholder="Price">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control required"
                                    placeholder="Quantity">
                            </div>
                            <div class="control-group form-group mb-0">
                                <label class="form-label">Tags</label>
                                <input type="text" name="tags" class="form-control required" placeholder="Tags">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control required" placeholder="Image">
                            </div>

                            <div class="card-title">
                                Select Categories
                            </div>
                            @foreach ($categories as $category)
                                <div class="form-group">
                                    <label for="">{{ $category->name }}</label>
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" >
                                </div>
                            @endforeach

                            <div class="control-group form-group">
                                <label class="form-label">Product Images</label>
                                <input type="file" name="images[]" class="form-control required" placeholder="Image" multiple>
                            </div>

                            <button class="btn btn-primary">Upload</button>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
