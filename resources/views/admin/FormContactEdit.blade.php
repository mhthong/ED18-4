@extends('layouts.app')
@section('head')
<script>
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea#editor',
        relative_urls: false,
        directionality: 'rtl',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | rtl ltr",
        file_picker_callback: function (callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endsection
@section('header')
    @include('layouts.headerad')
@endsection

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<main>
@include('layouts.nav-admin')
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif







    <section class="panel important">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 flexb-c">
            <div class="bg-ad flexb-col-c">
             <h2 class="text-center pt-3">Cập Nhật Bài Viết</h2>
        <form class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('new.update', ['id' => $news->id]);}}" enctype="multipart/form-data">
          @csrf
            <div class="containerInput twothirds">
                <label for="name">Tiêu Đề Bài Viết</label>
                <input type="text" name="tittle" id="tittle" placeholder="" required minlength="20" maxlength="500" value="{{ $news->tittle}}"/>

                <label for="name">Nội Dung Bài Viết</label>
                 <textarea  cols="2" rows="2" name="description" id="description" placeholder="" required minlength="20" maxlength="2000"   value="{{ $news->description}}"></textarea>
               <label for="name">Ảnh Bài Viết ( 400* 300px )</label>
              <div class="input-group">

                    <span class="input-group-btn">

                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Thêm Ảnh
                      </a>
                    </span>
                     <input id="thumbnail" class="form-control" type="text" name="filepath">
                 </div>
                 <img  id="holder" style="margin-top:15px;max-height:100px;">
                 <div  id="holder"></div>
                 <p class="p-2">Hình Ảnh </p>
                 <img src="{{$news->images}}" alt="" sizes="" srcset="">
                 <p class="p-2">Hình Ảnh Cập Nhật</p>
                 <div class="holder" id="holder" value="{{ $news->images}}"></div>

                <div class="form-control">
                    <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
                </div>
            </div>


        </form>
    </div>
</div>
    </section>

</main>



@endsection

@section('footer')
<script>
    var route_prefix = "/admin/laravel-filemanager";
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
    @include('layouts.footerad')
@endsection

@section('script')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
{{--     @include('layouts.ckeditor'); --}}
    <script>
        var options = {
          filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
/*           filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form' */
        };
      </script>
    <script>
        CKEDITOR.replace('editor1', options);
    </script>
{{--     @include('ckfinder::setup'); --}}
@endsection

