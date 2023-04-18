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


    <section class="panel important" >
        <h2>Welcome to Your Custums Infomations</h2>

        <div class="table-users" style="width: 100%">
            <div class="header">Your News</div>
            <table cellspacing="0">
                <tr class="tr-header">
                    <th class="tittle-tb col-2">Name</th>
                    <th class="tittle-tb flexb-c col-2">Phone Number</th>
                    <th class="tittle-tb flexb-c col-2">Address</th>
                    <th class="tittle-tb flexb-c col-2">Email</th>
                    <th class="tittle-tb flexb-c col-3">Content</th>
                    <th class="edit-tb flexb-c col-1">View</th>
                  {{--   <th class="del-tb flexb-c col-1">Confirm</th> --}}
                </tr>
                @foreach ($informations as $row)
                <tr>
                    <td class="tittle-tb col-2">{{$row->name_customer}}</td>
                    <td class="tittle-tb flexb-c col-2">{{$row->phone_customer}}</td>
                    <td class="tittle-tb flexb-c col-2">{{$row->address_customer}}</td>
                    <td class="tittle-tb flexb-c col-2">{{$row->mail_customer}}</td>
                    <td class="tittle-tb flexb-c col-3">{{$row->content_customer}}</td>

                    <td class="edit-tb flexb-c col-1"  ><a href="{{ route('informations-confirm.view', ['id' => $row->id]) }}"><button class="btn btn-primary" >View</button>
                    </td>
{{--                     <td class="del-tb flexb-c col-1">
                    </a>
                    <form method="GET" action="{{ route('informations.update', ['id' => $row->id]) }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">
                            @if ($row->confirm == 'true')
                                {{ 'Unconfirm' }}
                            @endif
                            @if ($row->confirm == 'false')
                                {{ 'Confirm' }}
                            @endif
                        </button>
                    </form>
                </td> --}}


                </tr>
                @endforeach
            </table>
            {!! $informations->links() !!}
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
