@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">PRODUCT TABLE</h3>
                <div class="card-options">
                    <a href="index.html#" class="option-dots" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="index.html#">Today</a>
                        <a class="dropdown-item" href="index.html#">Last Week</a>
                        <a class="dropdown-item" href="index.html#">Last Month</a>
                        <a class="dropdown-item" href="index.html#">Last Year</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                        <thead class="">
                            <tr>
                                <th>IMAGE</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>DESCRIPTION</th>
                                <th>TAGS</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3"
                                        src="/storage/products/{{$product->image}}" alt="media1"></td>
                                <td>{{$product->name}}</span></td>
                                <td> ₦{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td class="number-font">{{$product->description}}</td>
                                <td>{{$product->tags}}</td>
                                <td><a href="{{ route('admin.edit-product',$product) }}"><button class="btn btn-outline bg-success">Edit</button></a></td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
