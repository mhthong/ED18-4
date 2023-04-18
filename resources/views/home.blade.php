
@extends('app')
@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@endsection
@section('header')

@endsection

@section('content')


@include('layouts.content')

@endsection

@section('footer')

@endsection

@section('script')

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.support-content').hide();
    $('a.btn-support').click(function(e){
      e.stopPropagation();
      $('.support-content').slideToggle();
    });
    $('.support-content').click(function(e){
      e.stopPropagation();
    });
    $(document).click(function(){
      $('.support-content').slideUp();
    });
});
</script>


@endsection

