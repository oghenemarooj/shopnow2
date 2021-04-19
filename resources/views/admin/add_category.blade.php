@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Add Category</h4>
    </div>
</div>


<div class="row ">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Add New Category
                </div>
            </div>
            <div class="card-body">
                <div id="wizard3">
                    @foreach ($errors->all() as $err  ){
                        <p class="text-danger">{{$err}}</p>
                    }

                    @endforeach
                    <form action="{{ route('admin.upload-category') }}" method="post" enctype="multipart/form-data">@csrf
                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control required" placeholder="Name">
                            </div>
                            <button class="btn btn-outline-dark">Add category</button>

                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    New Categories
                </div>
            </div>
            <div class="card-body">
                <div id="wizard3">
                    @foreach ($errors->all() as $err )
                    <p class="text-danger">
                      {{$err}}
                    </p>

                    @endforeach
                    <section>
                        @csrf
                        @foreach ($categories as $category)
                        <div class="form-group">
                            <label for="category one">{{$category->name}}</label>
                        </div>

                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
