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

        <section class="panel important">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 flexb-c">
                <div class="flexb-col-c bg-ad-1">
                    <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
                        id="add-blog-post-form" method="post" action="{{ route('general.post') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flexb-c col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"
                            style="align-items: flex-start;   justify-content: space-between;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                                <div class="bg-ad-form-left containerInput  twothirds">
                                    <div class="max-width-1200">
                                        <div class="flexbox-annotated-section">
                                            <div class="flexbox-annotated-section-annotation col-3">
                                                <div class="annotated-section-title pd-all-20">
                                                    <h2>Thông tin chung</h2>
                                                </div>
                                                <div class="annotated-section-description pd-all-20 p-none-t">
                                                    <p class="color-note">Cấu hình những thông tin cài đặt website.</p>
                                                </div>
                                            </div>

                                            <div class="flexbox-annotated-section-content bg-ad-form col-9 p-3">
                                                <div class="wrapper-content pd-all-20">
                                                    <div class="form-group" id="admin_email_wrapper"
                                                        data-emails="" data-max="4">
                                                        <label class="text-title-field" for="admin_email">Email quản trị
                                                            viên</label>
                                                        <div class="d-flex mt-2 more-email align-items-center">
                                                            <input type="email" class="next-input"
                                                                placeholder="" name="admin_email"
                                                                value="">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="flexbox-annotated-section">

                                            <div class="flexbox-annotated-section-annotation col-3">
                                                <div class="annotated-section-title pd-all-20">
                                                    <h2>Admin appearance</h2>
                                                </div>
                                                <div class="annotated-section-description pd-all-20 p-none-t">
                                                    <p class="color-note">Setting admin appearance such as editor,
                                                        language...</p>
                                                </div>
                                            </div>

                                            <div class="flexbox-annotated-section-content bg-ad-form col-9 p-3">
                                                <div class="wrapper-content pd-all-20">
                                                    <div class="form-group">
                                                        <label class="text-title-field" for="admin-logo">Logo trang quản
                                                            trị
                                                        </label>
                                                        <div class="form-group ">
                                                            <div class="holder holder1" id="data-preview-admin-logo" value="">
                                                            </div>
                                                            <div class="-space-y-px mb-4">
                                                                <div class="containerInput input-group">
                                                                    <span class="input-group-btn ">
                                                                        <a class="text-primary data-image" id="admin-logo"
                                                                            data-input="data-input-admin-logo"
                                                                            data-preview="data-preview-admin-logo">
                                                                            Chọn ảnh
                                                                        </a>
                                                                    </span>

                                                                    <input class="form-control" id="data-input-admin-logo"
                                                                        style="display: none" type="text" name="admin-logo"
                                                                        required>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-title-field" for="admin-favicon">Admin favicon
                                                        </label>
                                                        <div class="form-group ">
                                                            <div class="holder holder1" id="data-preview-admin-favicon" value="">
                                                            </div>
                                                            <div class="-space-y-px mb-4">
                                                                <div class="containerInput input-group">
                                                                    <span class="input-group-btn ">
                                                                        <a class="text-primary data-image" id="admin-favicon"
                                                                            data-input="data-input-admin-favicon"
                                                                            data-preview="data-preview-admin-favicon">
                                                                            Chọn ảnh
                                                                        </a>
                                                                    </span>

                                                                    <input class="form-control" id="data-input-admin-favicon"
                                                                        style="display: none" type="text" name="admin-favicon"
                                                                        required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-title-field"
                                                            for="admin-login-screen-backgrounds">Login screen backgrounds
                                                            (~1366x768)
                                                        </label>
                                                        <div class="form-group ">
                                                            <div class="holder holder1" id="data-preview-admin-login-screen-backgrounds" value="">
                                                            </div>
                                                            <div class="-space-y-px mb-4">
                                                                <div class="containerInput input-group">
                                                                    <span class="input-group-btn ">
                                                                        <a class="text-primary data-image" id="admin-login-screen-backgrounds"
                                                                            data-input="data-input-admin-login-screen-backgrounds"
                                                                            data-preview="data-preview-admin-login-screen-backgrounds">
                                                                            Chọn ảnh
                                                                        </a>
                                                                    </span>

                                                                    <input class="form-control" id="data-input-admin-login-screen-backgrounds"
                                                                        style="display: none" type="text" name="admin-login-screen-backgrounds"
                                                                        required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-title-field" for="admin_title">Tiêu đề trang
                                                            quản trị</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="admin_title" id="admin_title"
                                                            value="PHẾ LIỆU PHÚC LỘC">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flexbox-annotated-section">
                                            <div class="flexbox-annotated-section-annotation col-3">
                                                <div class="annotated-section-title pd-all-20">
                                                    <h2>Google Analytics</h2>
                                                </div>
                                                <div class="annotated-section-description pd-all-20 p-none-t">
                                                    <p class="color-note">Config Credentials for Google Analytics</p>
                                                </div>
                                            </div>

                                            <div class="flexbox-annotated-section-content bg-ad-form col-9 p-3">
                                                <div class="wrapper-content pd-all-20">
                                                    <div class="form-group">
                                                        <label class="text-title-field" for="google_analytics">Tracking
                                                            Code</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="google_analytics" id="google_analytics" value=""
                                                            placeholder="Example: GA-12586526-8">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-title-field" for="analytics_view_id">View
                                                            ID</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="analytics_view_id" id="analytics_view_id"
                                                            value="" placeholder="Google Analytics View ID">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-title-field"
                                                            for="analytics_service_account_credentials">Service Account
                                                            Credentials</label>
                                                        <textarea class="next-input form-control" name="analytics_service_account_credentials"
                                                            id="analytics_service_account_credentials" rows="5" placeholder="Service Account Credentials">{
                                                            "type": "service_account",
                                                            "project_id": "august-cascade-288106",
                                                            "private_key_id": "2d4dcbe0bb82d83e9d529d4988e6e53550fea11b",
                                                            "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDQ3eDoVSVnJpn8\nWoz9B7/Gb/g7/u3K1nW3fEID9RPV6yrZ0lxaBG87fOidRfeT62LORHgfKwyyZ/Tx\nmeum4wXceUvs97oi6ETid5ITyu9koNZL31PcETlmCXueKx++JRyMxj9Dj4RE77Uh\n/xTeCJg3POrZACasPd4xNKASgJlObQbJi/Daa6xlHoQbIn+OLtvr1FUKjLtvmMKe\nhGG6dXeUTFHKh2Gzr2BeIUfAXt6jRUSyTknZZZJNMiZUmTbk5YQUy87MHs251HNb\n227G/BjR6+u6Zl3tjBuvsANdlLqhn0KRtKYT1fArcxKq/ZlWEs4g6StM3hkFkxTd\n0CG2i9WPAgMBAAECggEAI6A87RQc6Z/FcyxU0RIBzYyquD0O/WKgOJhawEcMx5ex\nuu6tLvODr49qM+1LwfDL7Sfzn0leBI5D0vPwpIojpUwRPc2xc6PPoBtKENM0CyN9\n+foRWT+c3UEv0zZC11GIMaDdCJ6Rrpp+eFqEiizIHd/npPToI8f3vsfdp9pEjAIw\npM+RX5E2OTiYFnVrYq1IxW6FgstOwWo064JI9kf04/bPsA357tcgC1qcYXSCYpy0\n7utwOfuySdLWbu1MjLZCT9ZW9hnaYtd3xIkrVc56/7EeEA/9D+kJv10PH7IjhHov\ncqDcFvuQvbrFPUAbqjGJAKRnGVrCUtLNj4//32B3vQKBgQD5CyY9ait3vQhC1s0E\najz9ZdVGk6QZpNa+RoJ6sfQXbG27pU7bwZP+v1Jhv2itYW3EYjDRbhlCbNYEEI+y\ncmJdkVcWNFRbfkG8TtNcjUMjFfOWsxYstKKBnDKW4x2O09t64H3vChLsZopPnywU\nv8msq3pFuf0p74p1NQsF2o1kuwKBgQDWs28qlBDxTlSJ9C4Mg7DASf0ceQUQBXoo\nNqLFnnazI8P7v8yrtr73cJoGn/dxtaaMj+i5zbekrcHMI94Eax6gIKsmcH8rq4Fv\nA/D0mnvgKz5tNUBu90xtjwLv/lvA6/GbXCboghSj/XC5+hLVdJUFPZFwBDgu3R8d\nfhHIgI2vPQKBgQDbtv1us2tUAT73kQBhQ8U5Hg1ybbEaOraGOjjFPJiHzc5l/Wq8\nMGV8G5j3yeH1DP7FgodlTYgVdWW/Qkk0evvTZvV5DoPaEGK4WqbYgXxYyPYV3zvS\nBy9Tv9VWD1s1di2tk78nFDErxS+DHX/LcoTfxI1kVLlItR/nVfu6l12lHwKBgFu8\nO0l0DnEsSM7Q+EP8mK7wbieWReV8kZ9RCOdrN8h/BaQxZWARKzNKd2VRQEbjmJAC\nhSuujELewylYQeqdYm6ExtwbwRqFoz4t7ux0fW1gzMGYuTkwjQVaz6R/h/C8X3VE\nQJOj0PHovhuYkCeIMowUrGmyQ9cyP7M4RJzo4KD5AoGAQacVDzI9NBWXODukzoEJ\nYLbqD80MbAmRbuix7TzeAM9Ru1JAOltnaJeSgvuPMP7qH8rihX31SGPp7PF8BRWA\nWVYZDyDGjHpAWi8iAg9AUtqc+5tMIjrGLnYDoyJXWtF3BJRCXsMWFZHAmcfZojKA\ngHO0p/XKcdVtNRh97ZCvys8=\n-----END PRIVATE KEY-----\n",
                                                            "client_email": "triluc1@august-cascade-288106.iam.gserviceaccount.com",
                                                            "client_id": "105636376897355695855",
                                                            "auth_uri": "https://accounts.google.com/o/oauth2/auth",
                                                            "token_uri": "https://oauth2.googleapis.com/token",
                                                            "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
                                                            "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/triluc1%40august-cascade-288106.iam.gserviceaccount.com"
                                                            }</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flexbox-annotated-section">
                                            <div class="flexbox-annotated-section-annotation col-3">
                                                <div class="annotated-section-title pd-all-20">
                                                    <h2>Newsletter</h2>
                                                </div>
                                                <div class="annotated-section-description pd-all-20 p-none-t">
                                                    <p class="color-note">Settings for newsletter</p>
                                                </div>
                                            </div>

                                            <div class="flexbox-annotated-section-content bg-ad-form col-9 p-3">
                                                <div class="wrapper-content pd-all-20">
                                                    <div class="form-group">
                                                        <label class="text-title-field"
                                                            for="newsletter_mailchimp_api_key">Mailchimp API Key</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="newsletter_mailchimp_api_key"
                                                            id="newsletter_mailchimp_api_key" value=""
                                                            placeholder="Mailchimp API Key">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-title-field"
                                                            for="newsletter_mailchimp_list_id">Mailchimp List ID</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="newsletter_mailchimp_list_id"
                                                            id="newsletter_mailchimp_list_id" value=""
                                                            placeholder="Mailchimp List ID">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-title-field"
                                                            for="newsletter_sendgrid_api_key">Sendgrid API Key</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="newsletter_sendgrid_api_key"
                                                            id="newsletter_sendgrid_api_key" value=""
                                                            placeholder="Sendgrid API Key">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-title-field"
                                                            for="newsletter_sendgrid_list_id">Sendgrid List ID</label>
                                                        <input data-counter="120" type="text" class="next-input"
                                                            name="newsletter_sendgrid_list_id"
                                                            id="newsletter_sendgrid_list_id" value=""
                                                            placeholder="Sendgrid List ID">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="bg-ad-form right-sidebar ">
                                    <div class="widget meta-boxes form-actions form-actions-default action-horizontal ">
                                        <div class="widget-title">
                                            <h4>
                                                <span>Xuất bản</span>
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="btn-set">
                                                <button type="submit" name="submit" value="save"
                                                    class="btn btn-info">
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

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection

    @section('footer')
        @include('layouts.footerad')
    @endsection
    @section('script')
        <script src={{ asset('ckeditor/ckeditor.js') }}></script>

        <script>
            var options = {
                filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            };
        </script>
        <script>
            CKEDITOR.replace('editor1', options);
            /*  $('textarea.editor1').ckeditor(options); */
        </script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
            var route_prefix = "/admin/laravel-filemanager";
            $('#admin-logo').filemanager('image', {
                prefix: route_prefix
            });
            $('#admin-favicon').filemanager('image', {
                prefix: route_prefix
            });
            $('#admin-login-screen-backgrounds').filemanager('image', {
                prefix: route_prefix
            });
        </script>
        <script>
            $(".btn-trigger-show-seo-detail").click(function() {
                $('.seo-edit-section').toggleClass('hidden-active');
            });
        </script>
    @endsection
