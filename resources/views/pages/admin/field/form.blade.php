@extends('layout.admin')
@section('title')
    @if ($field->id)
        Edit {{ $field->id }}
    @else
        Tambah Lapangan
    @endif
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                {{--                <div class="breadcrumb-item active"><a href="{{ route('dashboard::index') }}">Dashboard</a></div>--}}
                <div class="breadcrumb-item active"><a href="{{ route('admin::field::index') }}">Jadwal</a></div>
                @if ($field->id)
                    {{--                    <div class="breadcrumb-item active"><a href="{{ route('field::show',[$field]) }}">{{$field->name}}</a></div>--}}
                                        <div class="breadcrumb-item">Edit</div>
                @else
                    <div class="breadcrumb-item">Tambah Data Lapangan</div>
                @endif
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form method="post"
                      action="{{ $field->id ? route('admin::field::update', [$field]) : route('admin::field::store')}}">
                    @csrf
                    @if ($field->id)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Lapangan</label>
                            <input type="text" class="form-control" name="name" value="{{$field->name}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" name="price" value="{{$field->price}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" name="address" value="{{$field->address}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact Person</label>
                            <input type="text" class="form-control" name="phone" value="{{$field->phone}}">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_open" value="1" name="is_open" {{$field->is_open ? 'checked' : ''}}>
                            <label for="is_open">Apakah buka ?</label>
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
