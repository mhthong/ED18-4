@extends('layouts.app')

@section('header')
    @include('layouts.headerad')
@endsection

@section('content')

    <main>
        @include('layouts.nav-admin')

        @include('admin.Notifications')


        <section class="panel important">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 flexb-c">
                <div class="bg-ad flexb-col-c">

                    <div class="table-admin" style="width: 100% ">

                        <table class="table-home table-home-1">
                            <thead>
                                <a href="{{ route('create') }}" class="">
                                    <button class="btn btn-primary mt-3 mb-3">
                                        <i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i>Tạo mới
                                    </button>
                                </a>
                            </thead>
                            <thead>
                                <tr>

                                    <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1 checkbox-style">
                                        <input type="checkbox" name="check[]" id="">
                                        STT</th>
                                    <th scope="col" class="col-lg-3 col-xl-3 col-xxl-3">Tên</th>
                                    <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">Hình ảnh</th>
                                    <th scope="col" class="col-lg-4 col-xl-4 col-xxl-4">CATEGORIES</th>
                                    <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Trang Thái</th>
                                    <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">Tác Vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($Posts)
                                    @foreach ($Posts as $row)
                                        <tr>

                                            <td scope="row" class="col-lg-1 col-xl-1 col-xxl-1 checkbox-style" data-label="STT">
                                                <input type="checkbox" name="check[]" value="{{$row->id}}" id="">
                                                {{ $stt++ }}
                                            </td>
                                            <td class="col-lg-3 col-xl-3 col-xxl-3 line_clamp_2" data-label="Tên">{{ $row->name }}</td>
                                            <td class="col-lg-1 col-xl-1 col-xxl-1" style="height: 60px" data-label="Hình ảnh">
                                                <img  src="{{ asset($row->image) }}" alt="" height="60px" width="60px">
                                            </td>
                                            <td class="col-lg-4 col-xl-4 col-xxl-4 line_clamp_2" data-label="CATEGORIES">

                                                @isset( $Menus_category[$row->id])
                                                    @foreach ( $Menus_category[$row->id] as $key => $value)
                                                        @foreach ($value as $menu)
                                                        <a class="me-2 " href=""> {{ $menu->name }}</a>
                                                        @endforeach
                                                    @endforeach
                                                @endisset

                                            </td>
                                            <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Trang Thái">
                                                @isset($row->status)
                                                    @if ($row->status == 'published')
                                                        <span class="published"> {{ $row->status }}</span>
                                                    @endif

                                                    @if ($row->status == 'pending')
                                                        <span class="pending">Đang chờ xử lý</span>
                                                    @endif

                                                    @if ($row->status == 'draft')
                                                        <span class="draft">Bảng nháp</span>
                                                    @endif
                                                @endisset

                                            </td>
                                            <td class="col-lg-1 col-xl-1 col-xxl-1 flexb-c" data-label="Tác Vụ" >

                                                <button class="btn btn-primary ">
                                                <a href="{{ route('edit-posts', ['id' => $row->id]) }}">
                                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                </a>
                                                </button>

                                            <form method="POST" action="{{ route('posts.delete', ['id' => $row->id]) }}"
                                                onsubmit="return ConfirmDelete( this )" class="p-0" style="    display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                        </tr>
                                        @endforeach

                                        @endisset
                                    </tbody>

                            </table>

                        </div>
                        <style>
                            nav[role=navigation] {
                                position: absolute;
                                bottom: 50px;
                                right: 50px;
                            }
                        </style>
                    </div>
                </div>
            </section>
        </main>
    @endsection

    @section('footer')
        @include('layouts.footerad')
    @endsection

    @section('script')
    @endsection
