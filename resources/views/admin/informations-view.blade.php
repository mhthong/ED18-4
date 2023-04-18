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
        <h2>Welcome to Your Custums Infomations</h2>

        <div class="table-users" style="width: 100%">
            <div class="header">Your Custums Information</div>

            <h5 class="m:1rem">Name customer</h5>
            <p class="m:2rem">{{ $informations->name_customer }}</p>
            <h5  class="m:1rem">Number phone customer</h5>
            <p class="m:2rem">{{ $informations->phone_customer }}</p>
            <h5  class="m:1rem">Email customer</h5>
            <p class="m:2rem">{{ $informations->mail_customer }}</p>
            <h5  class="m:1rem">Address customer</h5>
            <p class="m:2rem">{{ $informations->address_customer }}</p>
            <h5  class="m:1rem">Content</h5>
            <p class="m:2rem">{{ $informations->content_customer }}</p>
            <div class="m:2rem text:center">
                <form method="GET" action="{{ route('informations.update', ['id' => $informations->id]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">
                        @if ($informations->confirm == 'true')
                            {{ 'Unconfirm' }}
                        @endif
                        @if ($informations->confirm == 'false')
                            {{ 'Confirm' }}
                        @endif
                    </button>
                </form>

            </div>
        </div>

        <style>
            nav[role=navigation] {
                position: absolute;
                bottom: 50px;
                right: 50px;
            }
        </style>
    </section>
</main>
@endsection

@section('footer')
    @include('layouts.footerad')
@endsection

@section('script')
@endsection
