@extends('layouts.app')
@section('head')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endsection
@section('header')
    @include('layouts.headerad')
@endsection

@section('content')
<main>
@include('layouts.nav-admin')

@include('admin.Notifications')


    <section class="panel important">
        <h2>Welcome to Your Products </h2>
        <h2>Write a Products</h2>
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('product.upload')}}" enctype="multipart/form-data">
          @csrf
            <div class="containerInput twothirds">
                <label for="name">Name Product:</label>
                <input type="text" name="name" id="name" placeholder="" required minlength="10" maxlength="2000" />

                <label for="name">Description</label>
                <input type="text" name="description" id="description" placeholder="" required minlength="20" maxlength="2000" />

                <label for="name">Price</label>
                <input type="number" name="price" id="price" required >

                <label for="name">Product Image</label>
                <div class="input-group">
                    <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                      </a>
                    </span>
                     <input id="thumbnail" class="form-control" type="text" name="filepath" required>
                 </div>
                 {{-- <img  id="holder" style="margin-top:15px;max-height:100px;"> --}}
                 <div  id="holder"></div>
            </div>


            <div class="">
                <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
            </div>
   </form>

    </section>
</main>



@endsection

@section('footer')

@endsection


@section('script')
<script>
    var route_prefix = "laravel-filemanager";
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
   {{--  <script src={{ url('ckeditor/ckeditor.js') }}></script> --}}
{{--     @include('layouts.ckeditor'); --}}
{{--     <script>
        var options = {
          filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
/*           filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form' */
        };
      </script>
    <script>
        CKEDITOR.replace('editor1', options);
    </script>
 --}}
{{--     @include('ckfinder::setup'); --}}
@endsection
