@extends('backend.layout.app')

@section('content')

@php
    $products = DB::table('products')->where('status', 1)->paginate(20);
@endphp

<h1>Welcome back {{auth::user()->name}}</h1><br><br>


<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h3 class="m-t-0 text-center"><b> ALL ACTIVE Products</b></h3><br>
            <div class="row m-t-10 m-b-10">


            </div>


            <div class="row ">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="table-responsive">
                        <table class="table table-actions-bar text-center">
                            <thead>
                                <tr>
                                    <th><center> # </center></th>
                                    <th><center> Image </center></th>
                                    <th><center>Product Name</center></th>
                                    <th><center>Price</center></th>

                                    <th style="min-width: 80px;"><center>Action</center></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $key => $item)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('public/productImages/'.$item->image)}}" class="thumb-lg" alt=""></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>

                                    <td>
                                        <a href="{{URL::to('product/edit/'.$item->id)}}" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="{{URL::to('product/delete/'.$item->id)}}" id="delete" class="table-action-btn" ><i class="md md-close"></i></a>
                                    </td>
                                </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                     <p style="float:right;"> {{ $products->links() }}</p>
                </div>
            </div>

        </div>

    </div> <!-- end col -->


</div>



@endsection
