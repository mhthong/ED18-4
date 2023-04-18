@extends('layouts.app')
@section('head')
    <style>
        .carousel__button {
            display: none !important;
        }
    </style>
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
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 flexb-c">
                <div class="flexb-col-c bg-ad-1">

                    <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
                        id="add-blog-post-form" method="post"
                        action="{{ route('update-simple-slider', ['id' => $data_slider->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flexb-c col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"
                            style="align-items: flex-start;   justify-content: space-between;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                                <div class="bg-ad-form bg-ad-form-left containerInput  twothirds p-3">
                                    <label for="name mt-0">Name</label>
                                    <input type="text" name="name" id="name" placeholder="" required
                                        value="@isset($data_slider->name){{ $data_slider->name }}@endisset"
                                        required />
                                    <label for="name">Key</label>
                                    <input type="text" style="background: #989898;" name="key" id="key"
                                        placeholder="" required
                                        value="@isset($data_slider->key){{ $data_slider->key }}@endisset"
                                        readonly />

                                    <label for="name">Mô tả</label>
                                    <textarea cols="2" rows="2" name="description" id="description" placeholder="Mô tả ngắn" required
                                        value=""> @isset($data_slider->description){{ $data_slider->description }}@endisset</textarea>
                                </div>

                                <div class="bg-ad-form bg-ad-form-left  containerInput twothirds p-3 mt-3">
                                    <div class="table-admin" style="width: 100% ">

                                        <table class="table-home table-home-1">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="col-md-1 col-lg-1 col-xl-1 col-xxl-1">ID</th>
                                                    <th scope="col" class="col-md-2 col-lg-2 col-xl-2 col-xxl-2">Hình Ảnh
                                                    </th>
                                                    <th scope="col" class="col-md-4 col-lg-4 col-xl-4 col-xxl-4">Tiêu Đề</th>
                                                    <th scope="col" class="col-md-2 col-lg-2 col-xl-2 col-xxl-2">Thứ Tự</th>
                                                    <th scope="col" class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">Operations
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dialog Contents -->
                                                <div id="dialog-content" style="display:none;max-width:500px;">

                                                    <form method="POST"
                                                        action="{{ route('created-simple-slider-item', ['id_simple' => $data_slider->id]) }}"
                                                        accept-charset="UTF-8"
                                                        id="botble-simple-slider-forms-simple-slider-item-form"
                                                        novalidate="novalidate">
                                                        @csrf

                                                        <div class="modal-title">
                                                            <i class="til_img"></i> <strong>
                                                                Add Slider
                                                            </strong>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <label for="title" class="control-label">Tiêu
                                                                    đề</label>
                                                                <input class="form-control" data-counter="120" name="title"
                                                                    type="text" value="#" id="title">
                                                            </div>
                                                            <label for="link" class="control-label">Liên
                                                                kết</label>
                                                            <input class="form-control" placeholder="http://" data-counter="120"
                                                                name="link" type="text" value="" id="link">
                                                        </div>

                                                        <label for="description" class="control-label">Mô tả</label>
                                                        <textarea class="form-control" rows="4" placeholder="Mô tả ngắn" data-counter="2000" name="description"
                                                            cols="50" id="description"></textarea>
                                                        <div class="form-group">
                                                            <label for="order" class="control-label">Thứ tự</label>
                                                            <input class="form-control" placeholder="Sắp xếp" name="order"
                                                                type="number" value="" id="order">
                                                        </div>
                                                        <div class="form-group ">
                                                            <p class="p-2 col-12">Hình ảnh</p>
                                                            <div class="holder holder1" id="data-preview-image" value="">
                                                            </div>
                                                            <div class="-space-y-px mb-4">
                                                                <div class="containerInput input-group">
                                                                    <span class="input-group-btn ">
                                                                        <a class="text-primary data-image" id=""
                                                                            data-input="data-add-image"
                                                                            data-preview="data-preview-image">
                                                                            Chọn ảnh
                                                                        </a>
                                                                    </span>
                                                                    <p class="p p-1 col-12 bg-span">Kích thước - W:1920*770px</p>
                                                                    <input class="form-control" id="data-add-image"
                                                                        style="display: none" type="text" name="image"
                                                                        required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary text-black bg-span">
                                                            Lưu thay đổi
                                                        </button>
                                                </div>

                                    </div>
                                    </form>
                                </div>

                                <!-- Dialog Trigger -->
                                <button data-fancybox="dialog" class="btn btn-primary mb-3" data-src="#dialog-content">
                                    <i class="fa-solid fa-pen-to-square"></i><span class="ps-1">Add new</span>
                                </button>

                                @foreach ($SimpleSliderItem as $row)
                                    <tr>
                                        <td scope="row" class="col-md-1 col-lg-1 col-xl-1 col-xxl-1" data-label="STT">
                                            @isset($row->id)
                                                {{ $row->id }}
                                            @endisset
                                        </td>
                                        <td class="col-md-2 col-lg-2 col-xl-2 col-xxl-2" data-label="Hình Ảnh">
                                            <img src="@isset($row->image)
                                                            {{ $row->image }}
                                                        @endisset"
                                                alt="@isset($row->image)
                                                        {{ $row->image }}
                                                    @endisset"
                                                srcset="" width="50px" height="50px">

                                        </td>
                                        <td class="col-md-4 col-lg-4 col-xl-4 col-xxl-4" data-label="Tiêu Đề">
                                            @isset($row->title)
                                                {{ $row->title }}
                                            @endisset
                                        </td>
                                        <td class="col-md-2 col-lg-2 col-xl-2 col-xxl-2" data-label="Thứ Tự">
                                            @isset($row->order)
                                                {{ $row->order }}
                                            @endisset

                                        </td>

                                        <td class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 flexb-c" data-label="Operations">

                                            <!-- Dialog Contents -->
                                            <div id="dialog-content.{{ $row->id }}" style="display:none;max-width:500px;">

                                                <form method="POST"
                                                    action="{{ route('update-simple-slider-item', ['id' => $row->id]) }}"
                                                    accept-charset="UTF-8" id="botble-simple-slider-forms-simple-slider-item-form"
                                                    novalidate="novalidate">
                                                    @csrf

                                                    <div class="modal-title">
                                                        <i class="til_img"></i> <strong>
                                                            Edit Slider
                                                            @isset($row->id)
                                                                {{ $row->id }}
                                                            @endisset
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <label for="title" class="control-label">Tiêu
                                                                đề</label>
                                                            <input class="form-control" data-counter="120" name="title"
                                                                type="text" value="#" id="title">
                                                        </div>
                                                        <label for="link" class="control-label">Liên
                                                            kết</label>
                                                        <input class="form-control" placeholder="http://" data-counter="120"
                                                            name="link" type="text" value="#" id="link">
                                                    </div>

                                                    <label for="description" class="control-label">Mô tả</label>
                                                    <textarea class="form-control" rows="4" placeholder="Mô tả ngắn" data-counter="2000" name="description"
                                                        cols="50" id="description"></textarea>
                                                    <div class="form-group">
                                                        <label for="order" class="control-label">Thứ tự</label>
                                                        <input class="form-control" placeholder="Sắp xếp" name="order"
                                                            type="number" value="1" id="order">
                                                    </div>
                                                    <div class="form-group ">
                                                        <img src="" alt="" sizes="" style="width: 200px;"
                                                            srcset="">
                                                        <p class="p-2 col-12">Hình ảnh</p>
                                                        <div class="-space-y-px mb-4">
                                                            <div class="containerInput input-group">
                                                                <span class="input-group-btn ">
                                                                    <a class="text-primary data-image" id=""
                                                                        data-input="@isset($row->id){{ $row->id }}@endisset"
                                                                        data-preview="@isset($row->id){{ 'holder' . $row->id }}@endisset">
                                                                        Chọn ảnh
                                                                    </a>
                                                                </span>
                                                                <p class="p p-1 col-12 bg-span">Kích thước - W:1920*770px</p>
                                                                <input class="form-control"
                                                                    id="@isset($row->id){{ $row->id }}@endisset"
                                                                    style="display: none" type="text" name="image" required>
                                                                <p class="p-2 col-12">Hình ảnh Cập Nhật</p>
                                                                <div class="holder holder1"
                                                                    id="@isset($row->id){{ 'holder' . $row->id }}@endisset"
                                                                    value=""></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary text-black bg-span">
                                                        Lưu thay đổi
                                                    </button>
                                            </div>




                            </div>
                            </form>
                        </div>

                        <!-- Dialog Trigger -->
                        <button data-fancybox="dialog" class="btn btn-primary m-1"
                            data-src="#dialog-content.{{ $row->id }}">
                            <i class="fa-solid fa-pen-to-square"></i><span class="ps-1 m-1">Sữa</span>
                        </button>

                        <form method="POST" action="{{ route('simple-slider-item.delete', ['id' => $row->id]) }}"
                            onsubmit="return ConfirmDelete( this )">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger m-1" type="submit"><i class="fa-solid fa-trash"></i>
                                <span class="ps-1 m-1">Xóa</span></button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>


                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="bg-ad-form bg-ad-form-left right-sidebar ">
                                    <div class="widget meta-boxes form-actions form-actions-default action-horizontal ">
                                        <div class="widget-title">
                                            <h4>
                                                <span>Xuất bản</span>
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="btn-set">
                                                <button type="submit" name="submit" value="save" class="btn btn-info">
                                                    <i class="fa fa-save"></i> Lưu
                                                </button>
                                                &nbsp;
                                                <button type="submit" name="submit" value="apply"
                                                    class="btn btn-success">
                                                    <i class="fa fa-check-circle"></i> Lưu &amp; chỉnh sửa
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-ad-form bg-ad-form-left right-sidebar mt-3">
                                    <div class="widget meta-boxes">
                                        <div class="widget-title">
                                            <h4><label for="status" class="m-0 control-label required"
                                                    aria-required="true">Trạng
                                                    thái</label></h4>
                                        </div>
                                        <div class="widget-body p-3">
                                            <div class="ui-select-wrapper form-group">
                                                <select class="form-control ui-select ui-select" id="status"
                                                    name="status">

                                                    <option value="published" selected="selected">Published</option>
                                                    <option value="draft">Bản nháp</option>
                                                    <option value="pending">Đang chờ xử lý</option>

                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>

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
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
        $('.data-image').filemanager('image', {
            prefix: route_prefix
        });
        $('#add-image').filemanager('image', {
            prefix: route_prefix
        });
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
                      filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form' */
        };
    </script>
    <script>
        CKEDITOR.replace('editor1', options);
    </script>

    <script>
        // Show HTML element
        Fancybox.show([{
            src: "#dialog-content",
            type: "inline",
            infinite: false,
        }]);

        // Show a copy of the element
        Fancybox.show([{
            src: "#dialog-content",
            type: "clone"
            infinite: false,
        }]);
    </script>
    {{--     @include('ckfinder::setup'); --}}
@endsection
