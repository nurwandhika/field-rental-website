@extends('layout.admin')
@section('title')
    Jadwal
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
            <div class="card-body">
                <form action="{{route('admin::schedule::index')}}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" class="form-control" min="{{now()->format('Y-m-d')}}" value="{{ $date ?? now()->format('Y-m-d')}}" name="date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="field" id="field" class="form-control">
                                    <option {{$field_selected == 0 ? 'selected' : ''}} value="0">Semua Lapangan</option>
                                    @foreach($fields as $field)
                                        <option value="{{$field->id}}" {{$field_selected == $field->id ? 'selected' : ''}}>{{$field->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 ml-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin::schedule::create')}}" class="btn btn-primary mr-auto">Tambah Jadwal +</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Lapangan</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Ganti Status</th>
                        </tr>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->id }}</td>
                                <td>{{ $schedule->field->name }}</td>
                                <td>{{ $schedule->datetime }}</td>
                                <td>@if($schedule->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($schedule->status == 'booked')
                                        <span class="badge badge-danger">Booked</span>
                                    @else
                                        <span class="badge badge-success">Available</span>
                                    @endif</td>
                                <td>
                                   @if($schedule->status == 'available')
                                        <a href="{{route('admin::schedule::change-status',[$schedule,'status' => 'booked'])}}" class="btn btn-danger">Booked</a>
                                    @elseif($schedule->status == 'booked')
                                        <a href="{{route('admin::schedule::change-status',[$schedule,'status' => 'available'])}}" class="btn btn-success">Available</a>
                                   @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        {{ $schedules->appends([
                            'date' => request()->input('date'),
                            'field' => request()->input('field'),

                        ])->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </section>
@endsection

