@extends('layout.admin')
@section('title')
    Peralatan
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
                    <a href="{{route('admin::equipment::create')}}" class="btn btn-primary mr-auto">Tambah Peralatan +</a>
                    <span class="mr-auto"></span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nama Alat</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($equipments as $equipment)
                                <tr>
                                    <td>{{ $equipment->id }}</td>
                                    <td>{{ $equipment->name }}</td>
                                    <td>{{ $equipment->desc}}</td>
                                    <td>{{ $equipment->price}}</td>
                                    <td>
                                        <a href="{{route('admin::equipment::edit',[$equipment])}}"
                                           class="btn btn-link">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
