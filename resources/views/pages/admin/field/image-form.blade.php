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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <form method="post"
                      action="{{ route('admin::field::image::store',[$field])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Foto Lapangan</label>
                            <input type="file" class="form-control-file" name="images[]" multiple>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
