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
        <h2>Welcome to Your Products</h2>

        <div class="table-users" style="width: 100%">
            <div class="header">Your Products</div>
            <table cellspacing="0">
                <tr class="">
                    <th class="col-1">Photo</th>
                    <th class="des-tb col-4">Name</th>
                    <th class="des-tb col-4">Description</th>
                    <th class="des-tb col-1">Price</th>
                    <th class="edit-tb col-1">Edit</th>
                    <th class="del-tb col-1">Delete</th>
                </tr>
                @foreach ($products as $row)
                <tr>
                    <td class="col-1"><img class="img-tb" src="{{ asset('storage/photos/1/products/'.$row->images) }}" alt=""></td>
                    <td class="des-tb col-4">{{ $row->name }}</td>
                    <td class="des-tb col-4">{{ $row->description }}</td>
                    <td class="des-tb col-1">{{ $row->price }} VND</td>
                    <td class="edit-tb flexb-c col-1"  ><a href="{{ route('products.edit', ['id' => $row->id]) }}"><button class="btn btn-primary" >Edit</button>
                    </td>
                    <td class="del-tb flexb-c col-1">
                        </a>
                        <form method="POST" action="{{ route('products.delete', ['id' => $row->id]) }}"
                            onsubmit="return ConfirmDelete( this )">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger " type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
            {!! $products->links() !!}
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
