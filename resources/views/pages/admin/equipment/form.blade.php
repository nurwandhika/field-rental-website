@extends('layout.admin')
@section('title')
    @if ($equipment->id)
        Edit {{ $equipment->id }}
    @else
        Tambah Peralatan
    @endif
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                {{--                <div class="breadcrumb-item active"><a href="{{ route('dashboard::index') }}">Dashboard</a></div>--}}
                <div class="breadcrumb-item active"><a href="{{ route('admin::equipment::index') }}">Jadwal</a></div>
                @if ($equipment->id)
                    {{--                    <div class="breadcrumb-item active"><a href="{{ route('equipment::show',[$equipment]) }}">{{$equipment->name}}</a></div>--}}
                    <div class="breadcrumb-item">Edit</div>
                @else
                    <div class="breadcrumb-item">Tambah Data Peralatan</div>
                @endif
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form method="post"
                      action="{{ $equipment->id ? route('admin::equipment::update', [$equipment]) : route('admin::equipment::store')}}">
                    @csrf
                    @if ($equipment->id)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Peralatan</label>
                            <input type="text" class="form-control" name="name" value="{{$equipment->name}}">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" class="form-control" name="desc" value="{{$equipment->desc}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" name="price" value="{{$equipment->price}}">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
