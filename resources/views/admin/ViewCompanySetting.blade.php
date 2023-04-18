<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 flexb-c">
    <div class="bg-ad-1 flexb-col-c">
        <div class="col-12 bg-ad" style="width: 98%">
        <nav id="active-form" class="tabs-left">
            <ul class=" flexb-col-c nav tabs" id="menu_tabs" style="align-items: flex-start; align-content: baseline;">
                <li class="tab-link  current" data-tab="a"><i class="fa-solid fa-house "></i><span> Thông Tin Chung</span></li>
                <li class="tab-link " data-tab="b"><i class="fa-solid fa-image "></i><span>Logo</span></li>
                <li class="tab-link " data-tab="c"><i class="fa-solid fa-file-lines "></i><span>Nội Dung - Trang Chủ</span></li>
                <li class="tab-link " data-tab="d"><i class="fa-sharp fa-solid fa-share-nodes "></i><span>Social</span></li>
                <li class="tab-link " data-tab="e"><i class="fa-brands fa-facebook "></i><span>Tích Hợp Facebook</span></li>
            </ul>
        </nav>
        </div>
    </div>
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 flexb-c">
    <div class="bg-ad-1 flexb-col-c">
        {{--    <h2 class="text-center text-white pt-3">SEO Setting</h2> --}}
        <div class="col-12 bg-ad" style="width: 98%">
        <form class="mt-8 space-y-6 col-12 none current" action="{{ route('setting-up') }}" method="POST"
            id="a">
            @csrf
            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Tên Trang</label>
                        <input class="form-control" id="page-name" name="page-name" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Tên Trang"
                            value="@isset($array['page-name']){{ $array['page-name'] }} @endisset">
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label for="seo_title">Tiêu đề SEO</label>
                        <input class="form-control" id="seo_title" name="seo_title" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Tiêu đề SEO"
                            value="@isset($array['seo_title']){{ $array['seo_title'] }} @endisset">
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput">
                    <div class="form-group ">
                        <label for="seo_description" class="control-label">Mô tả SEO</label>
                        <textarea class="form-control" rows="4" name="seo_description" value="" cols="50" id="seo_description"
                            required> @isset($array['seo_description']){{ $array['seo_description'] }}@endisset</textarea>
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput">
                    <div class="form-group ">
                        <img src="" alt="" sizes="" srcset="">
                        <label for="seo_og_image" class="control-label">Hình chia sẻ</label>
                        <div class="-space-y-px mb-4">
                            <div class="containerInput input-group">
                                <span class="input-group-btn ">
                                    <a class="text-primary" id="lfm1" data-input="seo_image"
                                        data-preview="holder1">
                                        Chọn ảnh
                                    </a>
                                </span>
                                <p class="p p-1 col-12 bg-span">Kích thước - W:1200*630px</p>
                                <input class="form-control" id="seo_image" style="display: none" type="text"
                                    name="seo_image" required>
                                <p class="p-2 col-12">Hình chia sẻ</p>
                                <img src="@isset($array['seo_image']){{ asset($array['seo_image']) }} @endisset"
                                    alt="" sizes="" style="width: 200px;" srcset="">
                                <p class="p-2 col-12">Hình chia sẻ Cập Nhật</p>
                                <div class="holder holder1" id="holder1" value=""></div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Màu nền Footer</label>
                        <input class="form-control" id="footer-color" name="footer-color" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="#000000"
                            value="@isset($array['footer-color']){{ $array['footer-color'] }} @endisset">
                    </div>
                </div>
            </div>
            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Copyright</label>
                        <input class="form-control" id="Copyright" name="Copyright" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Copyright"
                            value="@isset($array['Copyright']){{ $array['Copyright'] }} @endisset">
                        <p class="p p-1 col-12 bg-span">Copyright ở footer trang</p>
                    </div>
                </div>
            </div>


            <div class="-space-y-px mb-4">
                <div class="containerInput form-group">
                    <label>Hotline</label>
                    <input class="form-control" id="hotline" name="hotline" type="tel"
                        pattern="[0]{1}[0-9]{9}" required
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="hotline"
                        value="@isset($array['hotline']){{ $array['hotline'] }}@endisset">

                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput form-group">
                    <label>Hotline 2</label>
                    <input class="form-control" id="hotline-1" name="hotline-1" type="tel"
                        pattern="[0]{1}[0-9]{9}" required
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="hotline"
                        value="@isset($array['hotline-1']){{ $array['hotline-1'] }}@endisset">

                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Tên Doang Nghiệp</label>
                        <input class="form-control" id="name-company" name="name-company" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Tên Doang Nghiệp"
                            value="@isset($array['name-company']){{ $array['name-company'] }} @endisset">
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input class="form-control" id="address-company" name="address-company" type="text"
                            required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Địa Chỉ"
                            value="@isset($array['address-company']){{ $array['address-company'] }} @endisset">
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput form-group">
                    <label>Email</label>
                    <input class="form-control" id="email-company" name="email-company" type="text"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Email"
                        value="@isset($array['email-company']){{ $array['email-company'] }}@endisset">
                </div>
            </div>
            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Google map embed</label>
                        <textarea cols="30" rows="5"class="form-control" id="Google-map-embed" name="Google-map-embed"
                            type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Chèn iframe - google map" value="">
                @isset($array['Google-map-embed'])
                {{ $array['Google-map-embed'] }}
                @endisset
                </textarea>
                        <p class="p p-1 col-12 bg-span">Chèn iframe - google map</p>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary text-black bg-span">
                    Lưu thay đổi
                </button>
            </div>
        </form>
        </div>
        <div class="col-12 bg-ad" style="width: 98%">
        <form class="mt-8 space-y-6 col-12 none" action="{{ route('setting-up') }}" method="POST" id="b">
            @csrf
            <div class="-space-y-px mb-4">
                <div class="containerInput">
                    <div class="form-group ">
                        <label for="Favicon_manager" class="control-label">Favicon</label>
                        <img src="@isset($array['Favicon']){{ asset($array['Favicon']) }} @endisset"
                            alt="Favicon" sizes="" style="width: 200px;" srcset="">
                        <div class="-space-y-px mb-4">
                            <div class="containerInput input-group">
                                <span class="input-group-btn ">
                                    <a class="text-primary" id="Favicon_manager" data-input="Favicon"
                                        data-preview="Favicon_image">
                                        Chọn ảnh
                                    </a>
                                </span>
                                <p class="p p-1 col-12 bg-span">Kích thước: W:32*32px</p>
                                <input class="form-control" id="Favicon" style="display: none" type="text"
                                    name="Favicon" required>
                                <p class="p-2 col-12">Favicon Cập Nhật</p>
                                <div class="holder Favicon_image" id="Favicon_image" value=""></div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput">
                    <div class="form-group ">
                        <label for="Logo_manager" class="control-label">Logo</label>
                        <img src="@isset($array['Logo']){{ asset($array['Logo']) }} @endisset"
                            alt="Logo" sizes="" style="width: 200px;" srcset="">
                        <div class="-space-y-px mb-4">
                            <div class="containerInput input-group">
                                <span class="input-group-btn ">
                                    <a class="text-primary" id="Logo_manager" data-input="Logo"
                                        data-preview="Logo_image">
                                        Chọn ảnh
                                    </a>
                                </span>
                                <p class="p p-1 col-12 bg-span">Kích thước: H:70px - Chiều rộng tùy chỉnh.</p>
                                <input class="form-control" id="Logo" style="display: none" type="text"
                                    name="Logo" required>
                                <p class="p-2 col-12">Logo Cập Nhật</p>
                                <div class="holder Logo_image" id="Logo_image" value=""></div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput">
                    <div class="form-group ">
                        <label for="logo mobile_manager" class="control-label">Logo mobile</label>
                        <img src="@isset($array['logo_mobile']){{ asset($array['logo_mobile']) }} @endisset"
                            alt="logo mobile" sizes="" style="width: 200px;" srcset="">
                        <div class="-space-y-px mb-4">
                            <div class="containerInput input-group">
                                <span class="input-group-btn ">
                                    <a class="text-primary" id="logo_mobile_manager" data-input="logo_mobile"
                                        data-preview="logo_mobile_image">
                                        Chọn ảnh
                                    </a>
                                </span>
                                <p class="p p-1 col-12 bg-span">H:50px - Chiều rộng tùy chỉnh.</p>
                                <input class="form-control" id="logo_mobile" style="display: none" type="text"
                                    name="logo_mobile" required>
                                <p class="p-2 col-12">logo mobile Cập Nhật</p>
                                <div class="holder logo_mobile_image" id="logo_mobile_image" value=""></div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary text-black bg-span">
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
    <div class="col-12 bg-ad" style="width: 98%">
        <form class="mt-8 space-y-6 col-12 none" action="{{ route('setting-up') }}" method="POST" id="c">
            @csrf
            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Mô tả - Bảng Giá Chuyển Nhà</label>
                        <input class="form-control" id="des-page-main-1" name="des-page-main-1" type="text"
                            required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Mô tả - Bảng Giá Chuyển Nhà"
                            value="@isset($array['des-page-main-1']){{ $array['des-page-main-1'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Nội Dung - Lưu ý</label>
                        <input class="form-control" id="des-page-main-2" name="des-page-main-2" type="text"
                            required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Nội Dung - Lưu ý"
                            value="@isset($array['des-page-main-2']){{ $array['des-page-main-2'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Mô Tả - Dịch Vụ Chuyển Nhà</label>
                        <input class="form-control" id="des-page-main-3" name="des-page-main-3" type="text"
                            required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Mô Tả - Dịch Vụ Chuyển Nhà"
                            value="@isset($array['des-page-main-3']){{ $array['des-page-main-3'] }} @endisset">
                    </div>
                </div>

            </div>


            <div>
                <button type="submit" class="btn btn-primary text-black bg-span">
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
    <div class="col-12 bg-ad" style="width: 98%">
        <form class="mt-8 space-y-6 col-12 none " action="{{ route('setting-up') }}" method="POST" id="d">
            @csrf
            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" id="Facebook" name="Facebook" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://facebook.com"
                            value="@isset($array['Facebook']){{ $array['Facebook'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input class="form-control" id="Twitter" name="Twitter" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://twitter.com"
                            value="@isset($array['Twitter']){{ $array['Twitter'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Linkedin</label>
                        <input class="form-control" id="Linkedin" name="Linkedin" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://linkedin.com"
                            value="@isset($array['Linkedin']){{ $array['Linkedin'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Zalo</label>
                        <input class="form-control" id="Zalo" name="Zalo" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://zalo"
                            value="@isset($array['Zalo']){{ $array['Zalo'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Youtube</label>
                        <input class="form-control" id="Youtube" name="Youtube" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://youtube.com"
                            value="@isset($array['Youtube']){{ $array['Youtube'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Instagram</label>
                        <input class="form-control" id="Instagram" name="Instagram" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://instagram.com"
                            value="@isset($array['Instagram']){{ $array['Instagram'] }} @endisset">
                    </div>
                </div>

            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group">
                        <label>Pinterest</label>
                        <input class="form-control" id="Pinterest" name="Pinterest" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="https://pinterest.com"
                            value="@isset($array['Pinterest']){{ $array['Pinterest'] }} @endisset">
                    </div>
                </div>

            </div>

            <div>
                <button type="submit" class="btn btn-primary text-black bg-span">
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
    <div class="col-12 bg-ad" style="width: 98%">
        <form class="mt-8 space-y-6 col-12 none " action="{{ route('setting-up') }}" method="POST" id="e">
            @csrf
            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group ">
                        <label for="facebook_chat_enabled" class="control-label">Enable Facebook chat?</label>
                        <select id="facebook_chat_enabled" name="facebook_chat_enabled" class="form-control">
                            <option value="no" selected="selected">No</option>
                            <option value="yes">Yes</option>
                        </select>
                        <span class="bg-span">Để hiển thị Chatbox, vui lòng truy cập
                            <a href="https://www.facebook.com/105909558156296/settings/?tab=messenger_platform">
                                https://www.facebook.com/105909558156296/settings/?tab=messenger_platform</a>
                            và thêm <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>
                            vào danh sách xác thực!</span>
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group ">
                        <label for="facebook_page_id" class="control-label">
                            Facebook page ID
                        </label>
                        <input name="facebook_page_id" type="text" value="105909558156296" id="facebook_page_id"
                            class="form-control">
                        <span class="bg-span">Bạn có thể lấy fanpage ID bằng trang
                            <a href="https://findmyfbid.com">https://findmyfbid.com</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group ">
                        <label for="facebook_comment_enabled_in_post" class="control-label">
                            Bật Facebook comment trong trang chi tiết?</label>
                        <select id="facebook_comment_enabled_in_post" name="facebook_comment_enabled_in_post"
                            class="form-control">
                            <option value="yes">Yes</option>
                            <option value="no" selected="selected">No</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group ">
                        <label for="facebook_app_id" class="control-label">Facebook App ID</label>
                        <input name="facebook_app_id" type="text" value="105909558156296" id="facebook_app_id"
                            class="form-control">
                        <span class="bg-span">Bạn có thể tạo app trong
                            <a href="https://developers.facebook.com/apps">https://developers.facebook.com/apps</a>
                        </span>
                    </div>
                </div>
            </div>


            <div class="-space-y-px mb-4">
                <div class="containerInput ">
                    <div class="form-group ">
                        <label for="facebook_admins" class="control-label">
                            Facebook Admins
                        </label>
                        <div class="repeater">
                            <div data-repeater-list="facebook_admins">
                              <div data-repeater-item class="data-repeater-item">
                                <div class="form-group data-repeater-form">
                                    {{-- <input name="facebook_admins[0][0][key]" type="hidden" value="text"> --}}
                                    <label for="f2c6be2ae579c0933ac1457f64a44c1b">Facebook Admin ID</label>
                                    <input class="form-control" data-counter="40" id="f2c6be2ae579c0933ac1457f64a44c1b" name="value" type="text">
                                </div>

                               <span data-repeater-delete type="button" class="remove-item-button">
                                <i class="fa fa-times"></i>
                            </span>
                              </div>
                            </div>
                            <input data-repeater-create type="button" class="bg-add" value="Add New"/>
                        </div>
                        <span class="bg-span">Facebook admins để quản lý comments
                            <a href="https://developers.facebook.com/docs/plugins/comments">
                                https://developers.facebook.com/docs/plugins/comments
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary text-black bg-span">
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
    </div>
</div>


