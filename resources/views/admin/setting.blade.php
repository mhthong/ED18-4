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
        <section class="panel p-1" >
            <div class="p-2 bg-secondary">
                <h2 class="text-white">Tuỳ chọn giao diện</h2>
            </div>
            <div class=""></div>
            @include('admin.ViewCompanySetting')



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
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm1').filemanager('image', {prefix: route_prefix});
    $('#Favicon_manager').filemanager('image', {prefix: route_prefix});
    $('#Logo_manager').filemanager('image', {prefix: route_prefix});
    $('#logo_mobile_manager').filemanager('image', {prefix: route_prefix});
</script>


<Script style="text/javascript">

$(document).ready(function(){

$('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');
    $('ul.tabs li').removeClass('current');
    $('.none').removeClass('current');
    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
})


})

</Script>

<script src="{{ asset('js/add-new-form.js') }}"></script>

@endsection
