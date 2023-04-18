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

@include('layouts.nav-admin')
@include('admin.Notifications')


<main>
    <section class="panel important">
        <h2>Update a Contact</h2>
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('contacts.update');}}" enctype="multipart/form-data">
          @csrf
            <div class="twothirds">
                <label for="textarea" class="m:1rem">Contact Link:</label>
                <textarea cols="40" rows="8" name="link" id="editor1">
                    {{ $contacts->link }}
                </textarea>
                <label for="textarea" class="m:1rem">Contact Information:</label>
                <textarea cols="40" rows="8" name="text" id="editor2">
                    {{ $contacts->text }}
                </textarea>
                <label for="textarea" class="m:1rem">Maps:</label>
                <textarea cols="40" rows="2" name="maps" id="editor3">
                    {{$contacts->maps}}
                </textarea>
                <div class="">
                    <button class="btn btn-primary m:2rem" type="submit" value="Submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
</main>

<style>
    .cke_contents{
        height: 300px !important;
    }
    img{
        width: 200px;
        height: auto !important;
        height: 100%;
        object-fit: cover;
        border-radius: 2rem;
    }
</style>


@endsection

@section('footer')
<script>
    var route_prefix = "/admin/laravel-filemanager";
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm1').filemanager('image', {prefix: route_prefix});
</script>
    @include('layouts.footerad')
@endsection

@section('script')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
{{--     @include('layouts.ckeditor'); --}}
    <script>
        var options = {
         /*  filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images', */
/*           filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form' */
        };
      </script>
    <script>
        CKEDITOR.replace('editor1', options);
        CKEDITOR.replace('editor2', options);
    </script>
{{--     @include('ckfinder::setup'); --}}
@endsection

