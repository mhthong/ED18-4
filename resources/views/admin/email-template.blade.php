@extends('layouts.app')

@section('content')
<header class="sticky bg-white" >
    <div class="header-destop-main">
        <div class="container">
            <div class="header-destop">
                <div class="menu">
                    <div class="logo col-2 flexb-c gap:10px">

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="header-mobile">
        <div class="container">
            <div class="header-destop">
                <div class="menu">
                    <div class="logo col-4 flexb-c gap:10px">

                    </div>
                </div>
            </div>

        </div>
    </div>
</header>


    <main>
        <section class="panel important ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 flexb-c">
                <div class="bg-ad flexb-col-c">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="    padding: 1rem;">
                            <div class="bg-white overflow-hidden sm:rounded-lg" style="line-height: 2rem">
                                <h1>Thông Tin Đăng Ký Du Học</h1>
                                <div class="min-h-screen flex justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        Họ và Tên Người Đăng ký :
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        {{ $data[0] }}
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                         Số Điện Thoại Người Đăng ký :

                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        {{ $data[1] }}
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        Email Người Đăng ký :
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <a href="tel:a[2]}}"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-ad " style="height: 50px; ">
        Bản quyền 2023 © CMS. Phiên bản: 7.2
    </footer>
@endsection

@section('footer')
@endsection

@section('script')
@endsection
