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
                    <tr>
                        <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">STT</th>
                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Tên</th>
                        <th scope="col" class="col-lg-5 col-xl-5 col-xxl-5">Key</th>
                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Trang Thái</th>
                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($SimpleSlider as $row)
                    <tr>
                        <td scope="row" class="col-lg-1 col-xl-1 col-xxl-1" data-label="STT">{{ $stt++}}</td>
                        <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Tên">{{ $row->name }}</td>
                        <td class="col-lg-5 col-xl-5 col-xxl-5" data-label="Key">{{ $row->key }}</td>
                        <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Trang Thái">
                            @isset($row->status)
                            @if ( $row->status =='published')
                            <span class="published"> {{$row->status}}</span>
                            @endif

                            @if ( $row->status =='pending')
                            <span class="pending">Đang chờ xử lý</span>
                            @endif

                            @if ( $row->status =='draft')
                            <span class="draft">Bảng nháp</span>
                            @endif

                            @endisset

                        </td>
                        <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Tác Vụ">
                            <a href="{{ route('SimpleSlider.edit', ['id' => $row->id]) }}">
                                <button class="btn btn-primary" >
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
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
