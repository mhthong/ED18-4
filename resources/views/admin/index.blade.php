@extends('layouts.app')

@section('header')
    @include('layouts.headerad')
@endsection

@section('content')
<main>
    @include('layouts.nav-admin')
@include('layouts.admin')
</main>
@endsection

@section('footer')
    @include('layouts.footerad')
@endsection




