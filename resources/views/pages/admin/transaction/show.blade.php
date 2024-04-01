@extends('layout.admin')
@section('title')
    Transaksi #{{$transaction->id}}
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            @if($transaction->status == 'pending')
                                <a href="{{route('admin::transaction::confirm',[$transaction])}}" class="btn btn-success mr-2">Konfirmasi Pembayaran</a>
                                <a href="{{route('admin::transaction::cancel',[$transaction])}}" class="btn btn-danger mr-2">Batalkan Pesanan</a>
                            @else
                                @if(auth('admin')->user()->role == 'superadmin')
                                    <a href="{{route('admin::transaction::pending',[$transaction])}}"
                                       class="btn btn-sm btn-warning">Pending Pesanan</a>
                                @endif
                            @endif
                        </div>
                        <div class="card-body">
                            <dt>ID</dt>
                            <dd>{{$transaction->id}}</dd>
                            <dt>Status</dt>
                            <dd>@if($transaction->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($transaction->status == 'cancel')
                                    <span class="badge badge-danger">Cancel</span>
                                @else
                                    <span class="badge badge-success">Success</span>
                                @endif</dd>
                            <hr>
                            <h5>Detail Pesanan</h5>
                            @foreach($transaction->bookings as $booking)
                                @if($booking->schedule_id > 0)
                                    <li>{{$booking->schedule->datetime}} - {{$booking->schedule->field->name}} @ {{$booking->schedule->field->price}}</li>
                                @elseif($booking->equipment_id > 0)
                                    <li>{{$booking->equipment->name}} - {{$booking->equipment->price}}</li>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($transaction->image != '')
                        <div class="card">
                            <div class="card-header">
                                Bukti Pembayaran
                            </div>
                            <div class="card-body">
                                <img style="max-width: 100%;" src="{{asset($transaction->image)}}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
