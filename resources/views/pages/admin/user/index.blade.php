@extends('layout.admin')
@section('title')
    User
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                {{--                <div class="breadcrumb-item active"><a href="{{ route('dashboard::index') }}">Dashboard</a></div>--}}
                <div class="breadcrumb-item">@yield('title')</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <form action="" >
                        <div class="form-group">
                            <input type="search" class="form-control" name="q" placeholder="Cari berdasarkan ID ...">
                        </div>

                        <button class="btn btn-primary">Cari</button>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nama User</th>
                                <th>Nomor Telefon</th>
                                <th>Username</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone}}</td>
                                    <td>{{ $user->username}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
