@extends('layout.admin')
@section('title')
    @if ($schedule->id)
        Edit {{ $schedule->id }}
    @else
        Tambah Jadwal
    @endif
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                {{--                <div class="breadcrumb-item active"><a href="{{ route('dashboard::index') }}">Dashboard</a></div>--}}
                                <div class="breadcrumb-item active"><a href="{{ route('admin::schedule::index') }}">Jadwal</a></div>
                @if ($schedule->id)
                    {{--                    <div class="breadcrumb-item active"><a href="{{ route('schedule::show',[$schedule]) }}">{{$schedule->name}}</a></div>--}}
                    {{--                    <div class="breadcrumb-item">Edit</div>--}}
                @else
                    <div class="breadcrumb-item">Tambah Data schedule</div>
                @endif
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form method="post"
                      action="{{ route('admin::schedule::store', [$schedule])}}">
                    @csrf
                    @if ($schedule->id)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="days">Jadwal</label>
                            <input type="date" class="form-control" name="date" min="{{now()->format('Y-m-d')}}" value="{{now()->format('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label for="field_id"></label>
                            <select name="field_id" id="field_id" class="form-control">
                                @foreach($fields as $field)
                                    <option value="{{$field->id}}">{{$field->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mulai jam</label>
                                    <input type="number" class="form-control" name="start" value="9" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Akhir jam</label>
                                    <input type="number" class="form-control" name="end" value="15" required="">
                                </div>
                            </div>
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
