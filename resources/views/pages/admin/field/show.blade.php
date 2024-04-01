@extends('layout.admin')
@section('title')
    {{$field->name}}
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
                    <a href="{{route('admin::field::edit',[$field])}}"
                       class="btn btn-info">Edit</a>
                </div>
                <div class="card-body">
                    <dt>Nama</dt>
                    <dd>{{$field->name}}</dd>
                    <dt>CP</dt>
                    <dd>{{$field->phone}}</dd>
                    <dt>Alamat</dt>
                    <dd>{{$field->address}}</dd>
                    <dt>Status</dt>
                    <dd>{{$field->is_open ? 'Buka' : 'Tutup'}}</dd>
                </div>
            </div>

                <div class="card">
                    <div class="card-header">
                        Galeri Lapangan <a href="{{route('admin::field::image::index',[$field])}}" class="ml-2 btn btn-primary">Tambah Foto</a>
                    </div>
                    <div class="card-body">
                        @if($field->images->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Id</td>
                                    <td>Gambar</td>
                                    <td>Aksi</td>
                                </tr>
                                @foreach($field->images as $image)
                                    <tr>
                                        <td>{{$image->id}}</td>
                                        <td class="p-2"><img style="max-width: 40%;" src="{{asset($image->image_url)}}" alt=""></td>
                                        <td><a href="#" class="btn btn-danger">Hapus</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @else
                            <div class="text-center">Belum ada foto</div>
                        @endif
                    </div>
                </div>
        </div>
    </section>
@endsection
