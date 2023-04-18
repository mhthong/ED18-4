
<footer>
    <div class="container" >
        <div class="footer-main">
            <div class="footer-item p:10px col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3"  >
                <div class="text-footer-one">
                <div class="logo col-12 flexb-c gap:10px m:0" data-mh="footer-header-1">

                </div>

                <div class="footer-text-1" data-mh="footer-text-1" style="justify-content: flex-start">

                    </div>
            </div>

            </div>
            <div class="footer-item p:10px col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">

                <div class="text-footer-one ps-1 pe-1">

                </div>
            </div>
            <div class="footer-item p:10px col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">

                <div class="text-footer-one ps-1 pe-1">
                    @isset($post_data['dich-vu-chuyen-van-phong'])
                    <div data-mh="footer-header-1" class="flexb-c text-white" style="justify-content: start;">
                        <span>DỊCH VỤ CHUYỂN VĂN PHÒNG</span>
                    </div>
                    <div class="footer-text-1" data-mh="footer-text-1">
                            @foreach ($post_data['dich-vu-chuyen-van-phong'] as $key => $value_data)
                                @foreach ($value_data as $value)
                                <a href="{{ route('post', ['slug'=>$value->slug]) }}">
                                <p class="text-fill-color:gray text-fill-color:#7388C1:hover">
                                    {{ $value->title }}.</p>
                                </a>
                                @endforeach
                            @endforeach
                    </div>
                    @endisset
                </div>
            </div>

            <div class="footer-item p:10px col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                <div class="text-footer-one ps-1 pe-1">
                    @isset($post_data['chinh-sach-khach-hang'])
                    <div data-mh="footer-header-1" class="flexb-c text-white" style="justify-content: start;">
                        <span>CHÍNH SÁCH KHÁCH HÀNG</span>
                    </div>

                    <div class="footer-text-1" data-mh="footer-text-1">

                            @foreach ($post_data['chinh-sach-khach-hang'] as $key => $value_data)

                                @foreach ($value_data as $value)
                                <a href="{{ route('post', ['slug'=>$value->slug]) }}">
                                <p class="text-fill-color:gray text-fill-color:#7388C1:hover">{{ $value->title }}.</p>
                                </a>
                                @endforeach

                            @endforeach

                    </div>
                    @endisset

                </div>
            </div>

        </div>

    </div>
    <div class="bg-style">
    <p class="p text-center text-white p-3">
        @isset($setting_data)
        {{$setting_data['Copyright']}}
        @endisset
    </p>
    </div>
</footer>
