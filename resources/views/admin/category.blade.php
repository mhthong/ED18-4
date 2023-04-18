@extends('layouts.app')
@section('head')
@endsection
@section('header')
    @include('layouts.headerad')
@endsection

@section('content')
    <main>
        @include('layouts.nav-admin')
        @include('admin.Notifications')

        <section class="panel p-1">
            <div class="p-2 bg-secondary">
                <h2 class="text-white">Tuỳ chọn giao diện</h2>
            </div>
            <div class=""></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 flexb-c">
                <div class=" bg-ad-1 flexb-col-c">
                    <div class="col-12 bg-ad" style="width: 98%">
                        <nav id="active-form" class="tabs-left">
                            <ul class=" flexb-col-c nav tabs menu_level" id="menu_tabs"
                                style="align-items: flex-start; align-content: baseline;">
                                <li class="tab-link menu_level_1 menu_add" data-tab="add">
                                    <button class="btn btn-primary menu_add_btn">Thêm mới</button>
                                </li>


                                @isset($data)
                                    @isset($data['Menus_parent'])
                                        @foreach ($data['Menus_parent'] as $Menus => $Menu)
                                            @foreach ($Menu as $Menus_name)
                                                <li class="tab-link menu_level_1" data-tab="{{ $Menus_name->id }}"><span>
                                                        {{ $Menus_name->name }}
                                                    </span>
                                                    <form class="distroy" method="POST"
                                                        action="{{ route('category.delete', ['id' => $Menus_name->id]) }}"
                                                        onsubmit="return ConfirmDelete( this )">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </li>

                                                @isset($data['parent_id'][$Menus_name->id])
                                                    @if (is_array($data['parent_id'][$Menus_name->id]) || is_object($data['parent_id'][$Menus_name->id]))
                                                        @foreach ($data['parent_id'][$Menus_name->id] as $parent_id => $mp_value)
                                                            <li class="tab-link menu_level_2" data-tab="{{ $mp_value }}">
                                                                <span>
                                                                    {{ $data['Menu_child_name'][$mp_value] }}
                                                                </span>

                                                                <form class="distroy" method="POST"
                                                                    action="{{ route('category.delete', ['id' => $mp_value]) }}"
                                                                    onsubmit="return ConfirmDelete( this )">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit"><i
                                                                            class="fa-solid fa-trash"></i></button>
                                                                </form>

                                                            </li>
                                                        @endforeach
                                                    @endif
                                                @endisset
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        @endisset
                    @endisset
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 flexb-c">
                <div class=" bg-ad-1 flexb-col-c">
                    <div class="col-12 bg-ad" style="width: 98%">
                        <form method="POST" action="{{ route('category-up') }}" class="mt-8 space-y-6 col-12 none current"
                            accept-charset="UTF-8" id="add">

                            @csrf

                            <div class="form-group">

                                <label for="name" class="control-label required" aria-required="true">Tên</label>
                                <input class="form-control valueInp" placeholder="Nhập tên" data-counter="120"
                                    name="name" type="text" id="valueInput">
                            </div>
                            <input type="hidden" name="model" value="">

                            <div class="form-group">

                                <label for="parent_id" class="control-label required" aria-required="true">Cha</label>

                                <div class="ui-select-wrapper form-group">
                                    <select class="select-search-full ui-select ui-select select2-hidden-accessible"
                                        id="parent_id" name="parent_id" tabindex="-1" aria-hidden="true">
                                        <option selected value="0">None</option>
                                        @isset($data['Menus_parent'])
                                            @foreach ($data['Menus_parent'] as $Menus => $Menu)
                                                @foreach ($Menu as $Menus_name)
                                                    <option value="{{ $Menus_name->id }}">{{ $Menus_name->name }}</option>
                                                @endforeach
                                            @endforeach
                                        @endisset
                                    </select>

                                </div>



                            </div>

                            <div class="form-group">

                                <label for="description" class="control-label">Mô tả</label>
                                <textarea class="form-control" rows="4" placeholder="Mô tả ngắn" data-counter="400" name="description"
                                    cols="50" id="description"></textarea>


                            </div>


                            <div class="form-group">
                                <label for="icon" class="control-label">Biểu tượng</label>
                                <input class="form-control" placeholder="Ex: fa fa-home" data-counter="60" name="icon"
                                    type="text" id="icon">
                            </div>

                            <div class="form-group">

                                <label for="order" class="control-label">Thứ tự</label>
                                <input class="form-control" placeholder="Sắp xếp" name="order" type="number"
                                    value="0" id="order">
                            </div>
                            <div class="form-group">

                                <label for="is_featured" class="control-label">Nổi bật?</label>

                                <label class="switch">
                                    <input type="hidden" name="is_featured" value="0">
                                    <input type="checkbox" name="is_featured" class="onoffswitch-checkbox"
                                        id="is_featured" value="1">
                                    <span class="slider"></span>
                                </label>




                            </div>

                            <div class="form-group ">
                                <label for="image" class="control-label">Hình ảnh</label>
                                <div class="holder image-category" id="image-category" value=""></div>
                                <div class="-space-y-px mb-4">
                                    <div class="containerInput input-group">
                                        <span class="input-group-btn ">
                                            <a class="text-primary" id="Favicon_manager" data-input="image"
                                                data-preview="image-category">
                                                Chọn ảnh
                                            </a>
                                        </span>
                                        <p class="p p-1 col-12 bg-span">1920*700 px - Chiều cao tùy chỉnh.</p>
                                        <input class="form-control" id="image" style="display: none" type="text"
                                            name="image" required>


                                    </div>

                                </div>
                            </div>

                            <div class="form-group">

                                <label for="status" class="control-label required" aria-required="true">Trạng
                                    thái</label>

                                <div class="ui-select-wrapper form-group">
                                    <select class="form-control ui-select ui-select" id="status" name="status">
                                        <option value="published">Published</option>
                                        <option value="draft">Bản nháp</option>
                                        <option value="pending">Đang chờ xử lý</option>
                                    </select>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div id="advanced-sortables" class="form-control pt-3 mt-3 meta-box-sortables">
                                <div id="seo_wrap" class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span>Tối ưu hoá bộ máy tìm kiếm (SEO)</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <a href="#" class="btn-trigger-show-seo-detail">Chỉnh sửa SEO</a>
                                        <div class="seo-preview">
                                            <p class="default-seo-description ">Thiết lập các thẻ mô tả giúp người dùng dễ
                                                dàng
                                                tìm thấy trên công cụ tìm kiếm như Google.</p>
                                            <div class="existed-seo-meta  hidden ">
                                                <span class="page-title-seo">

                                                </span>

                                                <div class="page-url-seo ws-nm">
                                                    <p>{{ env('APP_URL') }}</p>
                                                </div>

                                                <div class="ws-nm">
                                                    <span style="color: #70757a;">Feb 20, 2023 - </span>
                                                    <span class="page-description-seo">

                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="seo-edit-section hidden">
                                            <hr>
                                            <div class="form-group">
                                                <label for="seo_title" class="control-label">Tiêu đề trang</label>
                                                <input class="form-control" id="seo_title" placeholder="Tiêu đề trang"
                                                    data-counter="120" name="seo_meta[seo_title]" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="seo_description" class="control-label">Mô tả trang</label>
                                                <textarea class="form-control" rows="3" id="seo_description" placeholder="Mô tả trang" data-counter="160"
                                                    name="seo_meta[seo_description]" cols="50"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div
                                class="form-control pt-3 mt-3 widget meta-boxes form-actions form-actions-default action-horizontal">
                                <div class="widget-title">
                                    <h4>
                                        <span>Xuất bản</span>
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="btn-set">
                                        <button type="submit" name="submit" value="save"
                                            class="btn-sub btn btn-info">
                                            <i class="fa fa-save"></i> Lưu
                                        </button>
                                        &nbsp;
                                        <button type="submit" name="submit" value="apply"
                                            class="btn-sub btn btn-success">
                                            <i class="fa fa-check-circle"></i> Lưu &amp; chỉnh sửa
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="col-12 bg-ad" style="width: 98%">
                        @isset($data)
                            @isset($data['Menus_parent'])
                                @foreach ($data['Menus'] as $Menus_rows)
                                    <form class="mt-8 space-y-6 col-12 none"
                                        action="{{ route('update-menu', ['id' => $Menus_rows->id]) }}" method="POST"
                                        id="{{ $Menus_rows->id }}">

                                        @csrf

                                        <div class="form-group">
                                            <label for="name" class="control-label required" aria-required="true">Tên</label>
                                            <input class="form-control valueInp" placeholder="Nhập tên" data-counter="120"
                                                name="name" type="text" value="{{ $Menus_rows->name }}" id="valueInput">
                                        </div>

                                        @isset($data['MenuNodes'])
                                            @foreach ($data['MenuNodes'][$Menus_rows->id] as $MenuNode)
                                                <div class="form-group">
                                                    <label for="parent_id" class="control-label required"
                                                        aria-required="true">Cha</label>
                                                    <div class="ui-select-wrapper form-group">

                                                        <select
                                                            class="select-search-full ui-select ui-select select2-hidden-accessible"
                                                            id="parent_id" name="parent_id" tabindex="-1" aria-hidden="true">

                                                            @if ($MenuNode->parent_id === 0)
                                                                <option value="0" selected="0">None</option>

                                                                @foreach ($data['Menus_parent'] as $Menus => $Menu)
                                                                    @foreach ($Menu as $Menus_name)
                                                                        <option value="{{ $Menus_name->id }}">{{ $Menus_name->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endforeach
                                                            @else
                                                                <option value="0">None</option>
                                                                <option value="0">None</option>
                                                                @foreach ($data['Menus_parent'] as $Menus => $Menu)
                                                                    @foreach ($Menu as $Menus_name)
                                                                        @if ($Menus_name->id === $MenuNode->parent_id)
                                                                            <option value="{{ $Menus_name->id }}"
                                                                                selected="{{ $Menus_name->id }}">
                                                                                {{ $Menus_name->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif

                                                        </select>

                                                    </div>



                                                </div>
                                                <div class="form-group">


                                                    <label for="description" class="control-label">Mô tả</label>
                                                    <textarea class="form-control" rows="4" placeholder="Mô tả ngắn" data-counter="400" name="description"
                                                        cols="50" id="description">
                                                        @isset($MenuNode->description)
                                                 {{ $MenuNode->description }}
                                                         @endisset
                                                    </textarea>

                                                </div>
                                                <div class="form-group">
                                                    <label for="icon" class="control-label">Biểu tượng</label>
                                                    <input class="form-control" placeholder="Ex: fa fa-home" data-counter="60"
                                                        name="icon" type="text" id="icon"
                                                        value="@isset($MenuNode->icon_font)
                                                        {{ $MenuNode->icon_font }}
                                                        @endisset">
                                                </div>
                                                <div class="form-group">

                                                    <label for="order" class="control-label">Thứ tự</label>
                                                    <input class="form-control" placeholder="Sắp xếp" name="order" type="number"
                                                        value="0" id="order"
                                                        value="@isset($MenuNode->position)
                                                        {{ $MenuNode->position }}
                                                        @endisset">
                                                </div>
                                                <div class="form-group">


                                                    <div class="onoffswitch switch">
                                                        @isset($MenuNode->target)


                                                        @if ($MenuNode->target == 1)
                                                            <label for="is_featured" class="control-label">Nổi bật?</label>

                                                            <label class="switch">
                                                                <input type="hidden" name="is_featured" value="0">
                                                                <input type="checkbox" name="is_featured"
                                                                    class="onoffswitch-checkbox" id="is_featured" value="1"
                                                                    checked>
                                                                <span class="slider"></span>
                                                            </label>
                                                        @else
                                                            <label for="is_featured" class="control-label">Nổi bật?</label>

                                                            <label class="switch">
                                                                <input type="hidden" name="is_featured" value="0" checked>
                                                                <input type="checkbox" name="is_featured"
                                                                    class="onoffswitch-checkbox" id="is_featured" value="1">
                                                                <span class="slider"></span>
                                                            </label>
                                                        @endif
                                                        @endisset

                                                    </div>

                                                </div>
                                                <div class="form-group ">
                                                    <label for="image" class="control-label">Hình ảnh</label>
                                                    @isset($MenuNode->css_class)
                                                        <img src="{{ asset($MenuNode->css_class) }} " alt="image" sizes=""
                                                            style="width: 200px;" srcset="">
                                                        <div class="-space-y-px mb-4">
                                                            <div class="containerInput input-group">
                                                                <span class="input-group-btn ">
                                                                    <a class="text-primary data-image"
                                                                        data-input="data-input{{ $MenuNode->menu_id }}"
                                                                        data-preview="data-image{{ $MenuNode->menu_id }}">
                                                                        Chọn ảnh
                                                                    </a>
                                                                </span>
                                                                <p class="p p-1 col-12 bg-span">1920*700 px - Chiều cao tùy chỉnh.</p>
                                                                <input class="form-control" id="data-input{{ $MenuNode->menu_id }}"
                                                                    style="display: none" type="text" name="image">
                                                                <p class="p-2 col-12">Hình ảnh cập nhật</p>
                                                                <div class="holder image-category"
                                                                    id="data-image{{ $MenuNode->menu_id }}" value="image"></div>
                                                            </div>

                                                        </div>
                                                    @endisset

                                                </div>
                                            @endforeach
                                        @endisset

                                        <div class="form-group">

                                            <label for="status" class="control-label required" aria-required="true">Trạng
                                                thái</label>

                                            <div class="ui-select-wrapper form-group">

                                                <select class="form-control ui-select ui-select" id="status" name="status">

                                                    @isset($Menus_rows->status)
                                                        @if ($Menus_rows->status == 'published')
                                                            <option value="published" selected="selected">Published</option>
                                                            <option value="draft">Bản nháp</option>
                                                            <option value="pending">Đang chờ xử lý</option>
                                                        @endif

                                                        @if ($Menus_rows->status == 'draft')
                                                            <option value="published">Published</option>
                                                            <option value="draft" selected="draft">Bản nháp</option>
                                                            <option value="pending">Đang chờ xử lý</option>
                                                        @endif

                                                        @if ($Menus_rows->status == 'pending')
                                                            <option value="published">Published</option>
                                                            <option value="draft">Bản nháp</option>
                                                            <option value="pending" selected="pending">Đang chờ xử lý</option>
                                                        @endif
                                                    @endisset
                                                </select>

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div id="advanced-sortables" class="form-control pt-3 mt-3 meta-box-sortables">
                                            <div id="seo_wrap" class="widget meta-boxes">
                                                <div class="widget-title">
                                                    <h4><span>Tối ưu hoá bộ máy tìm kiếm (SEO)</span></h4>
                                                </div>

                                                @isset($MetaBoxes[$Menus_rows->id])
                                                    @foreach ($MetaBoxes[$Menus_rows->id] as $MetaBoxe)
                                                        <div class="widget-body">
                                                            <a href="#" class="btn-trigger-show-seo-detail">Chỉnh sửa SEO</a>
                                                            <div class="seo-preview">
                                                                <p class="default-seo-description ">Thiết lập các thẻ mô tả giúp người
                                                                    dùng
                                                                    dễ
                                                                    dàng
                                                                    tìm thấy trên công cụ tìm kiếm như Google.</p>
                                                                <div class="existed-seo-meta  hidden ">
                                                                    <span class="page-title-seo">

                                                                    </span>

                                                                    <div class="page-url-seo ws-nm">
                                                                        <p>{{ env('APP_URL') }}</p>
                                                                    </div>

                                                                    <div class="ws-nm">
                                                                        <span style="color: #70757a;">Feb 20, 2023 - </span>
                                                                        <span class="page-description-seo">

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @isset($MetaBoxe->meta_value)
                                                                <div class="seo-edit-section hidden">
                                                                    <hr>
                                                                    <div class="form-group">
                                                                        <label for="seo_title" class="control-label">Tiêu đề trang</label>
                                                                        <input class="form-control" id="seo_title"
                                                                            placeholder="Tiêu đề trang" data-counter="120"
                                                                            name="seo_meta[seo_title]" type="text"
                                                                            value="  {{ print_r(json_decode($MetaBoxe->meta_value, true)['seo_title'], true) }}">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="seo_description" class="control-label">Mô tả
                                                                            trang</label>
                                                                        <textarea class="form-control" rows="3" id="seo_description" placeholder="Mô tả trang" data-counter="160"
                                                                            name="seo_meta[seo_description]" cols="50">  {{ print_r(json_decode($MetaBoxe->meta_value, true)['seo_description'], true) }}</textarea>
                                                                    </div>
                                                                </div>
                                                            @endisset
                                                        </div>
                                                    @endforeach
                                                @endisset


                                            </div>

                                        </div>

                                        <div
                                            class="form-control pt-3 mt-3 widget meta-boxes form-actions form-actions-default action-horizontal">
                                            <div class="widget-title">
                                                <h4>
                                                    <span>Xuất bản</span>
                                                </h4>
                                            </div>
                                            <div class="widget-body">
                                                <div class="btn-set">
                                                    <button type="submit" name="submit" value="save"
                                                        class="btn-sub btn btn-info">
                                                        <i class="fa fa-save"></i> Lưu
                                                    </button>
                                                    &nbsp;
                                                    <button type="submit" name="submit" value="apply"
                                                        class="btn-sub btn btn-success">
                                                        <i class="fa fa-check-circle"></i> Lưu &amp; chỉnh sửa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                @endforeach
                            @endisset
                        @endisset
                    </div>
                </div>
            </div>
            </div>



        </section>
    </main>
@endsection

@section('footer')
    @include('layouts.footerad')
@endsection

@section('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "/admin/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
        $('#lfm1').filemanager('image', {
            prefix: route_prefix
        });
        $('#Favicon_manager').filemanager('image', {
            prefix: route_prefix
        });
        $('#Logo_manager').filemanager('image', {
            prefix: route_prefix
        });
        $('#logo_mobile_manager').filemanager('image', {
            prefix: route_prefix
        });
        $('.data-image').filemanager('image', {
            prefix: route_prefix
        });
    </script>


    <Script style="text/javascript">
        $(document).ready(function() {
            $('ul.tabs li').click(function() {
                var tab_id = $(this).attr('data-tab');
                $('ul.tabs li').removeClass('current');
                $('.none').removeClass('current');
                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            })

        })
    </Script>

    <script src="{{ asset('js/input.js') }}"></script>
    <script src="{{ asset('js/add-new-form.js') }}"></script>
@endsection
