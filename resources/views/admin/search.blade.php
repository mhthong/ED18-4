@extends('layouts.app')

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

        @include('admin.Notifications')

        <section class="panel important">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 flexb-c" style="position: relative;">


                <div class="bg-ad flexb-col-c" style="    width: 100%;">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="wrap">
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="What are you looking for?">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="" style="width: 100%; overflow-x:auto;">


                        <div class="header">Liên Hệ</div>
                        <table cellspacing="0">
                            <tr class="tr-header">
                                <th class="photo-tb col-1">STT</th>
                                <th class="tittle-tb flexb-c col-3">Tên</th>
                                <th class="des-tb flexb-c col-4">Email</th>
                                <th class="des-tb flexb-c col-3">Số Điện Thoại</th>
                                <th class="del-tb flexb-c col-1">Xóa</th>
                            </tr>
                            @if ($FormContact->isNotEmpty())
                            @foreach ($FormContact as $row)
                            <tr style="    justify-content: center;
                              align-items: center;">
                                      <td class="photo-tb col-1">{{ $stt++ }}</td>
                                <td class="tittle-tb col-3">{{ $row->name }}</td>
                                <td class="des-tb col-4">{{ $row->email }}</td>
                                <td class="des-tb col-3">{{ $row->phone }}</td>
                                </td>
                                <td class="del-tb flexb-c col-1">
                                    </a>
                                    <form method="POST" action="{{ route('FormContact.delete', ['id' => $row->id]) }}"
                                        onsubmit="return ConfirmDelete( this )">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        @else
                            @endif

                        </table>

                    </div>

                    <style>
                        nav[role=navigation] {
                            position: absolute;
                            bottom: 50px;
                            right: 50px;
                        }

                        .hidden {
                            display: none;
                        }
                    </style>
                </div>
            </div>
        </section>
        {!! $FormContact->links() !!}
    </main>
@endsection

@section('footer')
    @include('layouts.footerad')
@endsection

@section('script')
@endsection
