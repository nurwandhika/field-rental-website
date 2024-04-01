@extends('layout.admin')
@section('title')
    Lapangan
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
                                    <a href="{{route('admin::field::create')}}" class="btn btn-primary mr-auto">Tambah Lapangan +</a>
                    <span class="mr-auto"></span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Lapangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($fields as $field)
                                <tr>
                                    <td>{{ $field->id }}</td>
                                    <td>{{ $field->name }}</td>
                                    <td>{{ $field->is_open ? 'Buka' : 'Tutup' }}</td>
                                    <td>
                                        <a href="{{route('admin::field::show',[$field])}}"
                                           class="btn btn-link">Rincian</a>
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
