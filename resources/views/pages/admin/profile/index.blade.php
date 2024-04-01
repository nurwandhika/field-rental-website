@extends('layout.admin')
@section('title')
    Edit Profile
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Edit {{$admin->name}}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form method="post"
                      action="{{ route('admin::profile::update') }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="adminname" required="" value="{{ $admin->username }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required="" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password">
                            <span class="text-secondary">Jangan diisi apabila tidak ingin mengganti password.</span>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </section>
@endsection
