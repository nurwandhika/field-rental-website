@extends('layout.user')
@section('title')
Transaksi
@endsection
@section('content')
<div class="section">
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            {{-- <div class="breadcrumb-item"><a href="{{auth()->user() ? route('user::transaction') : route('auth::user-login') }}" class="btn btn-primary">{{auth()->user() ? 'Dashboard' : 'Login' }}</a>
        </div>--}}
    </div>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-header">
            {{-- <a href="{{route('transaction::create')}}" class="btn btn-primary mr-auto"> +</a>--}}
            <span class="mr-auto"></span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Pesanan</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>
                            <ul>
                                @foreach($transaction->bookings as $booking)
                                @if($booking->schedule_id > 0)
                                <li>{{$booking->schedule->datetime}} - {{$booking->schedule->field->name}} @ {{$booking->schedule->field->price}}</li>
                                <!--  -->
                                @endif
                                @endforeach
                            </ul>

                        </td>
                        <td>
                            @if($transaction->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                            @elseif($transaction->status == 'cancel')
                            <span class="badge badge-danger">Cancel</span>
                            @else
                            <span class="badge badge-success">Success</span>
                            @endif
                        </td>
                        <td>Rp. {{str_replace('.',',',$transaction->total)}}</td>
                        <td>
                            <a href="{{route('user::show-transaction',[$transaction])}}" class="btn btn-info">Detail Pesanan</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    {{ $transactions->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
@endsection