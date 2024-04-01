@extends('layout.admin')
@section('title')
    @if ($admin->id)
        Edit {{ $admin->name }}
    @else
        Tambah Data Admin
    @endif
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
{{--                <div class="breadcrumb-item active"><a href="{{ route('dashboard::index') }}">Dashboard</a></div>--}}
                <div class="breadcrumb-item active"><a href="{{ route('admin::admin::index') }}">Data Admin</a></div>
                @if ($admin->id)
                    <div class="breadcrumb-item">Edit {{$admin->name}}</div>
                @else
                    <div class="breadcrumb-item">Tambah Data Admin</div>
                @endif
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form method="post"
                      action="{{ $admin->id ? route('admin::admin::update', [$admin]) : route('admin::admin::store') }}">
                    @csrf
                    @if ($admin->id)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Admin</label>
                            <input type="text" class="form-control" name="name" required="" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required="" value="{{ $admin->username }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" {{$admin->id ? '':'required=""'}}>
                        </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
