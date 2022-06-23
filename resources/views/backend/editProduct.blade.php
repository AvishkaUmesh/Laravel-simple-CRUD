@extends('backend.layout.app')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h3 class="m-t-0  text-center"><b> EDIT PRODUCT</b></h3><br>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{url('store-edit-product/'.$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Product name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" required autofocus value="{{$product->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Product Image</label>
                            <div class="col-md-10">
                                <input type="file" name="image" id="image" autocomplete="off">
                                <br>
                                <img id="preview-image-before-upload" src=""
                                 style="max-height: 200px;">
                            </div>
                        </div>

                        <input type="hidden" name="oldimage" value="{{$product->image}}"><br>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Previous Image</label>
                            <div class="col-md-10">

                                <img  src="{{asset('public/productImages/'.$product->image)}}"
                                 style="max-height: 200px;">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-2 control-label">Price</label>
                            <div class="col-md-10">
                                <input type="number" name="price" class="form-control" min="1" required value="{{$product->price}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Product Status</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="status" required>

                                    <option value="1" @if($product->status ==1)
                                        selected
                                    @endif>Active</option>
                                    <option value="2"  @if($product->status == 0)
                                        selected
                                    @endif>Inactive</option>

                                </select>
                            </div>
                        </div>








                            <button type="submit" class="btn waves-effect waves-light btn-primary"style="float: right;">Update Product</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>




<script type="text/javascript">

    $(document).ready(function (e) {


       $('#image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

    </script>


@endsection
