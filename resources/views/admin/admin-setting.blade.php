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
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-9 col-xxl-3 crop-avatar">
                <!-- Profile links -->
                <div class="block">
                    <div class="block mt-element-card mt-card-round mt-element-overlay">
                        <div class="thumbnail">
                            <div class="thumb">
                                <div class="profile-userpic mt-card-item">
                                    <div class="avatar-view mt-card-avatar mt-overlay-1">
                                        <img src="" class="img-fluid img" alt="avatar">
                                        <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <a class="btn default btn-outline" id="avatar">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mt-card-content">
                                        <h3 class="mt-card-name">Quản Lý</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /profile links -->

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 flexb-c ">
                <div class="bg-ad flexb-col-c">
                    <h2 class="text-center pt-3">Thay đổi mật khẩu</h2>
                    <form class="mt-8 space-y-6 col-12" onsubmit="return validate()" action="{{ route('reset-password') }}"
                        method="POST">
                        @csrf

                        <div class="containerInput shadow-sm -space-y-px mb-4">
                            <div>
                                <label for="pass">Mật khẩu hiện tại :</label>
                                <input id="pass" name="pass" type="text" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Mật khẩu hiện tại">
                            </div>
                        </div>
                        <div class="containerInput shadow-sm -space-y-px mb-4" style="position: relative;">
                            <div>
                                <small></small>
                                <a class="eyes" onclick="passwordshow()"><i class="fa-solid fa-eye"></i></a>
                                <label for="pass">Mật khẩu mới (8 characters minimum):</label>
                                <input id="password-new" minlength="8" name="passwordnew" type="password" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Mật khẩu mới">
                            </div>
                        </div>
                        <div class="containerInput shadow-sm -space-y-px mb-4" style="position: relative;">
                            <div>
                                <small></small>
                                <a class="eyes" onclick="repasswordshow()"><i class="fa-solid fa-eye"></i></a>
                                <label for="pass">Xác nhận mật khẩu mới (8 characters minimum):</label>

                                <input id="password-renew" minlength="8" name="passwordrenew" type="password" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Xác nhận mật khẩu mới">
                            </div>
                        </div>
                        <button type="submit" style="color: cadetblue;"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium  bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Xác
                            Nhận</button>
                    </form>
                </div>
            </div>

        </section>
    </main>
@endsection

@section('footer')
    @include('layouts.footerad')
@endsection

@section('script')
    <script type="text/javascript">
        function validate() {
            var n1 = document.getElementById("password-new");
            var n2 = document.getElementById("password-renew");
            if (n1.value == n2.value) {
                return true;
            } else {
                alert("Thông tin không chính xác . Vui lòng kiểm tra lại");
                return false;
            }
        }
    </script>

    <script type="text/javascript">
        function passwordshow() {
            if (document.getElementById('password-new').type == 'text') {
                document.getElementById('password-new').type = 'password';
            } else {
                document.getElementById('password-new').type = 'text';
            }
        }

        function repasswordshow() {

            if (document.getElementById('password-renew').type == 'text') {
                document.getElementById('password-renew').type = 'password';
            } else {
                document.getElementById('password-renew').type = 'text';
            }
        }
    </script>
@endsection
